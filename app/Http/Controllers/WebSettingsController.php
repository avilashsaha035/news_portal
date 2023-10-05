<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebSettings;
use \Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebSettingsController extends Controller
{
    public $if_user = 0;

    //SuperAdmin
    public function __construct()
    {


        $this->middleware(function ($request, $next) {

            $this->middleware('auth');
            $role_user = DB::table('role_user')->where('user_id', '=', Auth::user()->id)->first();
            $this->if_user = $role_user;
            if($role_user){
                $role = DB::table('roles')->where('id', '=', $role_user->role_id)->first();
                if($role->name == "ROLE_SUPERADMIN"){
                    //dd("SuperAdmin");
                    $this->middleware('role:ROLE_SUPERADMIN');
                }
                if($role->name == "ROLE_ADMIN"){
                    //dd("Admin");
                    $this->middleware('role:ROLE_ADMIN');
                }
            }
            if(!$this->if_user){
                abort(401, 'This action is unauthorized.');
            }
            return $next($request);

        });



    }
    //Web-Settings [Add]
    public function add_websettings()
    {
        $role_user = DB::table('role_user')->where('user_id', '=', Auth::user()->id)->first();
        $role = DB::table('roles')->where('id', '=', $role_user->role_id)->first();
        $role_has_permission = DB::table('role_has_permissions')->where('role', '=', $role_user->role_id)->get();

        //dd("jksdk0");
        foreach($role_has_permission as $permission){

            if($role->name == "ROLE_ADMIN"){
                if($permission->permission == 9){
                    $websettings = WebSettings::all();
                    return view('superadmin.web_settings', compact('websettings'));
                }
            }

        }

        if($role->name == "ROLE_SUPERADMIN"){
            $websettings = WebSettings::all();
            return view('superadmin.web_settings', compact('websettings'));
        }
    }

    //Web-Settings [Insert]
    public function insert_websettings(Request $request)
    {

        $img = $request->file('logo');
        $img_destination = 'logo/'.time().'.'.$img->extension();
        $img->move(public_path('logo'),$img_destination);

        $icon = $request->file('icon');
        $icon_destination = 'icon/'.time().'.'.$icon->extension();
        $icon->move(public_path('icon'),$icon_destination);

        $websettings = new WebSettings();

        $websettings->logo = $img_destination;
        $websettings->icon = $icon_destination;
        $websettings->meta_title = $request->input('meta_title');
        $websettings->meta_desc = $request->input('meta_desc');
        $websettings->facebook_link = $request->input('facebook_link');
        $websettings->twitter_link = $request->input('twitter_link');
        $websettings->youtube_link = $request->input('youtube_link');
        $websettings->save();

        return redirect('/add_websettings')->with('message',"Meta Data Added Successfully");
    }

    //edit_websettings_get(view)
    public function edit_websettings($id) {
        $websettings = WebSettings::find($id);

	    return response()->json([
	      'data' => $websettings
	    ]);
    }
    //edit_websettings_post(update)
    public function update_websettings(Request $request) {

        $img_destination = 0;

        if($request->file('logo_new')){
            $websettings = WebSettings::find($request->w_id);
                 //dd($websettings);
            if($websettings->logo){
                File::delete(public_path($websettings->logo));
            }
            $img = $request->file('logo_new');
            $img_destination = 'logo/'.time().'.'.$img->extension();
            $img->move(public_path('logo'),$img_destination);
        }
        else{
            $img_destination = $request->logo_old;
        }

        $icon_destination = 0;

        if($request->file('icon_new')){
            $websettings = WebSettings::find($request->w_id);
            if($websettings->icon){
                File::delete(public_path($websettings->icon));
            }
            $icon = $request->file('icon_new');
            $icon_destination = 'icon/'.time().'.'.$icon->extension();
            $icon->move(public_path('icon'),$icon_destination);
        }
        else{
            $icon_destination = $request->icon_old;
        }

        WebSettings::where('id',$request->w_id)
        ->update([
            'logo'=>$img_destination,
            'icon'=>$icon_destination,
            'meta_title'=>$request->meta_title,
            'meta_desc'=>$request->meta_desc,
            'facebook_link'=>$request->facebook_link,
            'twitter_link'=>$request->twitter_link,
            'youtube_link'=>$request->youtube_link
        ]);

        return back()->with('message',"Successfully Updated");

    }

    //Web-Settings [Delete]
    // public function delete_websettings($id) {
    //     $websettings = WebSettings::find($id);
    //     $websettings->delete();
    // return back()->with('success',"Successfully Deleted");
    // }

    //Web-Settings [Soft-Delete]
    // public function softdelete_websettings($id)
    // {
    //    $websettings = WebSettings::find($id);
    //    $websettings->soft_delete = "activate";
    //    $websettings->save();
    //    return back()->with('success',"Successfully Soft-deleted");

    // }
    //Web-Settings [Restore]
    // public function restore_websettings($id)
    // {
    //    $websettings = WebSettings::find($id);
    //    $websettings->soft_delete = "deactivate";
    //    $websettings->save();
    //    return back()->with('success',"Successfully Restored");
    // }
}
