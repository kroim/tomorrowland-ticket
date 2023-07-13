<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Model\Packages;
use App\Model\Messages;
use App\Model\Visitors;
use App\Model\Orders;
use DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function index()
    {
        $packages = Packages::all();
        $popular_packages = array();
        $most_packages = array();
        foreach ($packages as $index => $package){
            if ($index < 4){
                array_push($popular_packages, $package);
            }elseif ($index < 10){
                array_push($most_packages, $package);
            }
        }
        if (sizeof($most_packages) < 3){
            $most_packages = array_merge($most_packages, $popular_packages);
        }
        return view('front.main.home', compact('popular_packages', 'most_packages'));
    }

    public function contact_us(){
        return view('front.main.contact_us');
    }
    public function tomorrowland(){
        $packages = Packages::all();
        return view('front.main.tomorrowland', compact('packages'));
    }

    public function contact_form(Request $request){
        if (isset($request['contact_submit'])){
            $message = new Messages;
            $message->name = $request['contact_name'];
            $message->email = $request['contact_email'];
            $message->subject = $request['contact_subject'];
            $message->message = $request['contact_message'];
            if ($message->save()){
                $confirm_message = "You sent your contact message successfully";
                return view('front.main.contact_us', compact('confirm_message'));
            }else{
                $confirm_message = "Your message is failed. Please try again.";
                return view('front.main.contact_us', compact('confirm_message'));
            }
        }else{
            return redirect('/');
        }
    }

    public function display_package($id){
        $package = Packages::find($id);
        return view('front.main.display_package', compact('package'));
    }

    public function err404(){
        return view('errors.404');
    }
    public function err405(){
        return view('errors.405');
    }

    public function check_visitor(Request $request){
        $ip = $request['ip'];
        $old_ip = Visitors::where('ip', $ip)->first();
        if($old_ip == null){
            $visitor = new Visitors;
            $visitor->ip = $ip;
            $visitor->save();
        }
    }
    // Payment system

    public function order(Request $request){
        if (isset($request['start_order'])){
            $p_id = $request['p_id'];
            $t_index = $request['t_id'];
            $package = Packages::find($p_id);
            $p_name = $package->name;
            $t_title = unserialize($package->tickets_title)[$t_index];
            $t_desc = unserialize($package->tickets_description)[$t_index];
            $t_price = unserialize($package->tickets_price)[$t_index];
            return view('front.main.order', compact('p_id','t_index', 'p_name','t_title','t_desc','t_price'));
        }else{
            return redirect('/tomorrowland');
        }
    }

    public function paymentPage(){
        $order_data = session('order_data');
        return view('front.main.payment',compact('order_data'));
    }
    public function successOrder($code){
        $order = Orders::where('code', $code)->first();
        return view('front.main.payment_success', compact('order'));
    }
    public function payment(Request $request){

        if (isset($request['order_submit'])){
            $ticket_num = (int)$request['order_counts'];
            $price = (int)$request['order_price'];
            $total_price = round($ticket_num*$price);
            $time = "4" . time() . "58";
            $order_id = Hash::make($time);
            $order_id = str_replace("/","_",$order_id);
            $order_data = array(
                'pId' => $request['order_p_id'],
                'tIndex' => $request['order_t_index'],
                'pName' => $request['order_p_name'],
                'tTitle' => $request['order_t_title'],
                'userId' => $request['order_userId'],
                'userName' => $request['order_name'],
                'userEmail' => $request['order_email'],
                'userPhone' => $request['order_phone'],
                'userAddress' => $request['order_address'],
                'orderCounts' => $ticket_num,
                'totalPrice' => $total_price,
                'orderID' => $order_id,
            );
            \Session::put('order_data',$order_data);
            //return view('front.main.payment', compact('order_data'));
            return redirect('tomorrowland/payment');
        }else{
            return redirect('/tomorrowland');
        }
    }
    public function payment_success(){
        $order_data = session('order_data');
        include (public_path('phpqrcode\qrlib.php'));
        $qr_text = trans('global.payment.order_id').": ".$order_data['orderID'];
        $qr_text .= "\n".trans('global.payment.total_price').": ".$order_data['totalPrice']." EUR";
        $qr_text .= "\n".trans('global.payment.buyer_name').": ".$order_data['userName'];
        $qr_text .= "\n".trans('global.account.email').": ".$order_data['userEmail'];
        $qr_text .= "\n".trans('global.account.phone').": ".$order_data['userPhone'];
        $qr_text .= "\n".trans('global.account.address').": ".$order_data['userAddress'];
        $qr_img = "uploads/order/".$order_data['orderID'].".png";
        \QRcode::png($qr_text,$qr_img,false,4,4);
        $order = new Orders;
        $order->code = $order_data['orderID'];
        $order->user_id = $order_data['userId'];
        $order->user_name = $order_data['userName'];
        $order->user_email = $order_data['userEmail'];
        $order->user_phone = $order_data['userPhone'];
        $order->user_address = $order_data['userAddress'];
        $order->order_package = $order_data['pName'];
        $order->order_ticket = $order_data['tTitle'];
        $order->order_counts = $order_data['orderCounts'];
        $order->order_price = $order_data['totalPrice'];
        $order->qr_img = $qr_img;
        $order->save();

        $img_url = $qr_img;
//        return view('templates.mail', compact('img_url'));
        \Mail::send('templates.mail', ['img_url' => $qr_img], function ($message) use ($qr_img, $order_data)  {
            $message->from('support@akbiglietti.com', 'Tomorrowland');
            $message->to($order_data['userEmail'], $order_data['userName'])->subject('QRCode');
        });

        session()->forget('order_data');
        return redirect('/tomorrowland/order/'.$order_data['orderID']);
    }

    // Register Pre Order
    public function pre_order(Request $request){
        if (isset($request['pre_order'])){
            $name = $request['name'];
            $email = $request['email'];
            $phone = $request['phone'];
            $address = $request['address'];
            $password = $request['password'];
            $user = User::where('email', $email)->first();
            if ($user == null){
                $new_user = new User;
                $new_user->name = $name;
                $new_user->email = $email;
                $new_user->password = bcrypt($password);
                $new_user->phone = $phone;
                $new_user->address = $address;
                if ($new_user->save()){
                    return \response()->json(array('success' => true, 'id' => $new_user->id));
                }
            }else{
                return \response()->json(array('success' => false));
            }
        }
    }
}
