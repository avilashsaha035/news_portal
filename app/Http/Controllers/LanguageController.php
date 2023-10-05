<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
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

    public function add_lang()
    {

        $role_user = DB::table('role_user')->where('user_id', '=', Auth::user()->id)->first();
        $role = DB::table('roles')->where('id', '=', $role_user->role_id)->first();
        $role_has_permission = DB::table('role_has_permissions')->where('role', '=', $role_user->role_id)->get();

        //dd("jksdk0");
        foreach($role_has_permission as $permission){

            if($role->name == "ROLE_ADMIN"){
                if($permission->permission == 1){
                    $language = Language::all();
                    return view('superadmin.language', compact('language'));
                }
            }

        }

        if($role->name == "ROLE_SUPERADMIN"){
            $language = Language::all();
            return view('superadmin.language', compact('language'));
        }

    }
    //insert_language
    public function insert_lang(Request $request)
    {
        $language = new Language();

        $language->lang_name_eng = $request->input('english');
        $language->lang_name_ban = $request->input('bangla');
        $language->save();

        return redirect('/add_lang')->with('message',"Language Added successfully");
    }
     //delete_language
     public function delete_lang($id)
     {
        //dd("hi");
        $language = Language::find($id);
        $language->delete();
        return redirect('/add_lang')->with('message',"Language Deleted successfully");
     }
}
