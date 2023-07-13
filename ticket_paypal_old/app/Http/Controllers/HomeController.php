<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Model\Packages;
use App\Model\Messages;
use App\Model\Visitors;
use DB;

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
}
