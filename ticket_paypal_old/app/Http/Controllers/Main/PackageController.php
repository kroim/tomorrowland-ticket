<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

use App\Model\Notes;
use App\Model\ImageCache;
use App\Model\Includes;
use App\Model\Tickets;
use App\Model\Packages;
use DB;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Image Moving from source folder to destination folder
    public function moving_images_edit($sour, $des){
        $files = scandir(public_path($sour));
        // Identify directories
        $source = public_path($sour.'/');
        $destination = public_path($des.'/');
        // Cycle through all source files
        foreach ($files as $file) {
            if (in_array($file, array(".",".."))) continue;
            // If we copied this successfully, mark it for deletion
            if (copy($source.$file, $destination.$file)) {
                $delete[] = $source.$file;
            }
        }
    }
    // Image Moving from source folder to destination folder
    public function moving_images_create($sour, $des){
        $files = scandir(public_path($sour));
        // Identify directories
        $source = public_path($sour.'/');
        $destination = public_path($des.'/');
        // Cycle through all source files
        foreach ($files as $file) {
            if (in_array($file, array(".",".."))) continue;
            // If we copied this successfully, mark it for deletion
            if (copy($source.$file, $destination.$file)) {
                $delete[] = $source.$file;
            }
        }
        // Delete all successfully-copied files
        if(isset($delete)){
            foreach ($delete as $file) {
                unlink($file);
            }
        }
    }

    public function index(){
        if (Gate::allows('users_manage')){
            DB::table('image_cache')->delete();
            $imageFolderPath = public_path('images');
            $files = scandir($imageFolderPath);
            foreach ($files as $file) {
                if (in_array($file, array(".",".."))) continue;
                unlink($imageFolderPath."\\".$file);
            }
            $packages = Packages::all();
            return view('back.main.packages.index', compact('packages'));
        }else{
            return redirect('/');
        }
    }

    public function add(Request $request){
        if (Gate::allows('users_manage')){
            if (isset($request['save_package'])){
                $package = new Packages;
                $package->name = $request['p_name'];
                $package->main_description = $request['p_description'];
                $package->sub_title = $request['p_title'];
                $package->sub_description= $request['pt_description'];
                $package->how_works= $request['pt_how_works'];
                $package->includes = serialize($request['p_includes']);
                $package->notes = serialize($request['p_notes']);
                $package->tickets_title = serialize($request['ticket_title']);
                $package->tickets_description = serialize($request['ticket_description']);
                $package->tickets_price = serialize($request['ticket_price']);
                $package->tickets_detail = serialize($request['t_details']);
                $package->tickets_time = $request['t_time'];
                $package->save();
                $package_id = $package->id;
                // image file moving
                $package_folder = 'uploads/packages/'.$package_id;
                if (!is_dir($package_folder)){
                    mkdir($package_folder);
                }
                $this->moving_images_create('images', $package_folder);
                // get image urls
                $image_names = ImageCache::all();
                $image_urls = array();
                foreach ($image_names as $image_name){
                    $image_url = $package_folder.'/'.$image_name->image_name;
                    array_push($image_urls, $image_url);
                }
                DB::table('image_cache')->delete();
                $package->images = serialize($image_urls);
                $package->save();
                return redirect('account/packages');
            }else{
                DB::table('image_cache')->delete();
                $imageFolderPath = public_path('images');
                $files = scandir($imageFolderPath);
                foreach ($files as $file) {
                    if (in_array($file, array(".",".."))) continue;
                    unlink($imageFolderPath."\\".$file);
                }
                return view('back.main.packages.add');
            }
        }else{
                return redirect('/');
        }
    }

    public function edit(Request $request){
        if (isset($request['get_sub'])){
            DB::table('image_cache')->delete();
            $id = $request['id'];
            $package = Packages::find($id);
            // Image Processing
            $image_urls = unserialize($package->images);
            $image_names = array();
            for ($index = 0; $index < sizeof($image_urls); $index++){
                $split_image = explode("/", $image_urls[$index]);
                $name = end($split_image);
                array_push($image_names, $name);
                DB::table('image_cache')->insert(['image_name'=>$name]);
            }
            // File Moving
            $source = 'uploads/packages/'.$id;
            $destination = 'images';
            $this->moving_images_edit($source, $destination);
            // End File Moving
            return view('back.main.packages.edit', compact('package'));
        }elseif (isset($request['post_sub'])){
            $package_id = $request['ep_id'];
            $package = Packages::find($package_id);
            $package->name = $request['ep_name'];
            $package->main_description = $request['ep_description'];
            $package->sub_title = $request['ep_title'];
            $package->sub_description= $request['ept_description'];
            $package->how_works= $request['ept_how_works'];
            $package->includes = serialize($request['ep_includes']);
            $package->notes = serialize($request['ep_notes']);
            $package->tickets_title = serialize($request['e_ticket_title']);
            $package->tickets_description = serialize($request['e_ticket_description']);
            $package->tickets_price = serialize($request['e_ticket_price']);
            $package->tickets_detail = serialize($request['et_details']);
            $package->tickets_time = $request['et_time'];
            // image file moving
            $package_folder = 'uploads/packages/'.$package_id;
            if (!is_dir($package_folder)){
                mkdir($package_folder);
            }
            $this->moving_images_create('images', $package_folder);
            // get image urls
            $image_names = ImageCache::all();
            $image_urls = array();
            foreach ($image_names as $image_name){
                $image_url = $package_folder.'/'.$image_name->image_name;
                array_push($image_urls, $image_url);
            }
            DB::table('image_cache')->delete();
            $package->images = serialize($image_urls);
            $package->save();
            return redirect('account/packages');
        }
    }

    public function delete(Request $request){
        if (Gate::allows('users_manage')){
            if (isset($request['dm_package_submit'])){
                $package_id = $request['dm_package_id'];
                $package = Packages::find($package_id);
                $package->delete();
                return redirect('/account/packages');
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/');
        }

    }
    public function upload_images(Request $request){
        $imageName = $request->file->getClientOriginalName();
        $request->file->move(public_path('images'), $imageName);
        // Database Control
        $res = ImageCache::where('image_name', $imageName)->first();
        if ($res == null){
            $image = new ImageCache;
            $image->image_name = $imageName;
            $image->save();
        }
        return response()->json(['success'=>$imageName]);
    }
    public function delete_images(Request $request){
        $fn=$request['id'];
        exec('rm "'.public_path('images').'\\'.$fn.'"');
        DB::table('image_cache')->where('image_name', $fn)->delete();
        return $fn;
    }
}
