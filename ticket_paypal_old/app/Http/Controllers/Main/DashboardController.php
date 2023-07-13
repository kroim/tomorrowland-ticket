<?php

namespace App\Http\Controllers\Main;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Model\Packages;
use App\Model\Orders;
use App\Model\Visitors;
use Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Mockery\Exception;
use Validator;
use Session;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Gate::allows('users_manage')){
            $orders = Orders::all();
        }else{
            $orders = Orders::where('user_id', Auth::user()->id)->get();
        }
        $user_count = User::count() + 101;
        $visitor_count = Visitors::count() + $user_count;
        $order_count = Orders::count() + 101;
        return view('back.main.dashboard', compact('orders','visitor_count','user_count','order_count'));
    }
    public function profile(Request $request){
        if (isset($request['save_profile'])){
            $file = $request->file('profile_image');
            $file_path = "";
            if(isset($file)){
                $filename = Auth::user()->email.'.'.$file->getClientOriginalExtension();
                $destinationPath = 'uploads/profile';
                $file->move($destinationPath, $filename);
                $file_path = $destinationPath.'/'.$filename;
            }
            $name = $request['reset_name'];
            $phone = $request['reset_phone'];
            $email = $request['reset_email'];
            $address = $request['reset_address'];
            $users = DB::table('users')->where('email', $email)->get();
            if (sizeof($users) > 1){
                $existing_user = "This mail is exist";
                return view('back.main.profile', compact('existing_user'));
            }else{
                $id = Auth::user()->id;
                DB::update('update users set name = ?, phone = ?, email = ?, address = ?, photo = ? WHERE id = ?',[$name, $phone, $email, $address, $file_path, $id]);
                $updated_user = "Updated your profile successfully!";
                header("Refresh:0");
                return view('back.main.profile', compact('updated_user'));
            }
        }else{
            return view('back.main.profile');
        }
    }

    public function reset_pwd(Request $request){
        if (isset($request['reset_pwd_sub'])){
            $old_pass = $request['old_pwd'];
            if(!Hash::check($old_pass, Auth::user()->getAuthPassword())){
                $oldpwd = "Password is not correct.";
                return view('back.main.profile', compact('oldpwd'));
            }
            else{
                $new_pass =  Hash::make($request['new_pwd']);
                DB::update('update users set password = ? WHERE id = ?',[$new_pass, Auth::id()]);
                $success_change = "Password is changed successfully!";
                return view('back.main.profile', compact('success_change'));
            }
        }else{
            return redirect('/account/profile');
        }
    }
    public function order(Request $request){
        if (isset($request['start_order'])){
            $p_id = $request['p_id'];
            $t_index = $request['t_id'];
            $package = Packages::find($p_id);
            $p_name = $package->name;
            $t_title = unserialize($package->tickets_title)[$t_index];
            $t_desc = unserialize($package->tickets_description)[$t_index];
            $t_price = unserialize($package->tickets_price)[$t_index];
            return view('front.main.order', compact('p_id','p_name','t_title','t_desc','t_price'));
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
            $total_price = 0;
            if($ticket_num >= 30){
                $total_price = round($ticket_num*$price*0.90);
            }else if($ticket_num >= 20){
                $total_price = round($ticket_num*$price*0.92);
            }else if($ticket_num >= 10){
                $total_price = round($ticket_num*$price*0.95);
            }else{
                $total_price = round($ticket_num*$price);
            }
            $time = "4" . time() . "58";
            $order_id = Hash::make($time);
            $order_id = str_replace("/","_",$order_id);
            $order_data = array(
                'pName' => $request['order_p_name'],
                'tTitle' => $request['order_t_title'],
                'userId' => $request['order_userId'],
                'userName' => $request['order_name'],
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
        $order_id = $order_data['orderID'];
        include (public_path('phpqrcode\qrlib.php'));
        $qr_text = trans('global.payment.order_id').": ".$order_id;
        $qr_text .= "\n".trans('global.payment.total_price').": ".$order_data['totalPrice']." EUR";
        $qr_text .= "\n".trans('global.payment.buyer_name').": ".$order_data['pName'];
        $qr_text .= "\n".trans('global.account.email').": ".Auth::user()->email;
        $qr_text .= "\n".trans('global.account.phone').": ".Auth::user()->phone;
        $qr_text .= "\n".trans('global.account.address').": ".Auth::user()->address;
        $qr_img = "uploads/order/".$order_id.".png";
        \QRcode::png($qr_text,$qr_img,false,4,4);
        $order = new Orders;
        $order->code = $order_id;
        $order->user_id = Auth::user()->id;
        $order->order_package = $order_data['pName'];
        $order->order_ticket = $order_data['tTitle'];
        $order->order_counts = $order_data['orderCounts'];
        $order->order_price = $order_data['totalPrice'];
        $order->qr_img = $qr_img;
        $order->save();

        $img_path = [
            'img_url' => $qr_img,
        ];
//        Mail::send('templates.mail', $img_path, function($message) {
//            $message->to(Auth::user()->email, 'Tomorrowland')->subject('QRCode');
//        });

        session()->forget('order_data');
        return redirect('/tomorrowland/order/'.$order_id);
    }
}
