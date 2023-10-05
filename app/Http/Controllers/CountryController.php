<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
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

    //Country Add
    public function add_country()
    {
        $role_user = DB::table('role_user')->where('user_id', '=', Auth::user()->id)->first();
        $role = DB::table('roles')->where('id', '=', $role_user->role_id)->first();
        $role_has_permission = DB::table('role_has_permissions')->where('role', '=', $role_user->role_id)->get();

        //dd("jksdk0");
        foreach($role_has_permission as $permission){

            if($role->name == "ROLE_ADMIN"){
                if($permission->permission == 2){
                    $country = Country::all();
                    return view('superadmin.country', compact('country'));
                }
            }

        }

        if($role->name == "ROLE_SUPERADMIN"){
            $country = Country::all();
            return view('superadmin.country', compact('country'));
        }

    }

    //insert_country
    public function insert_country(Request $request)
    {
        $country = new Country();

        $country->country_name_eng = $request->input('english');
        $country->country_name_ban = $request->input('bangla');
        $country->status = $request->input('status');
        $country->soft_delete = "deactivate";
        $country->save();

        return redirect('/add_country')->with('message',"Country Added Successfully");
    }
    //active_country
    public function active_country($id)
    {
        Country::find($id)->update([
            'status'=>"active",
        ]);
        return back()->with('message',"Successfully Activated");
    }
    //de-active_country
    public function deactive_country($id)
    {
        Country::find($id)->update([
            'status'=>"deactive",
        ]);
        return back()->with('message',"Successfully De-activated");
    }
    //soft_delete_country
    public function softdlt_country($id)
    {
       $country = Country::find($id);
       $country->soft_delete = "activate";
       $country->save();
       return redirect('/add_country')->with('message',"Country Soft-deleted Successfully");

    }
    //restore_country
    public function restore_country($id)
    {
       $country = Country::find($id);
       $country->soft_delete = "deactivate";
       $country->save();
       return redirect('/add_country')->with('message',"Country Restored Successfully");
    }
    //delete_country
    public function delete_country($id)
    {
       $country = Country::find($id);
       $country->delete();
       return redirect('/add_country')->with('message',"Country Deleted successfully");
    }
    //edit_country_get(view)
    public function edit_country($id) {
        $country = Country::find($id);

	    return response()->json([
	      'data' => $country
	    ]);
    }
    //edit_country_post(update)
    public function update_country(Request $request) {

        Country::where('id',$request->c_id)
        ->update([
            'country_name_eng'=>$request->english,
            'country_name_ban'=>$request->bangla,
            'status'=>$request->status
        ]);

        return back()->with('success',"Successfully Updated");

    }
}
