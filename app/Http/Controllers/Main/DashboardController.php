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
use function Sodium\compare;
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
        $order_count = Orders::count() + 490;
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
}
