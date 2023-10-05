<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City_union_village;
use App\Models\District;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
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

    //City [Add]
    public function add_city()
    {

        $role_user = DB::table('role_user')->where('user_id', '=', Auth::user()->id)->first();
        $role = DB::table('roles')->where('id', '=', $role_user->role_id)->first();
        $role_has_permission = DB::table('role_has_permissions')->where('role', '=', $role_user->role_id)->get();

        //dd("jksdk0");
        foreach($role_has_permission as $permission){

            if($role->name == "ROLE_ADMIN"){
                if($permission->permission == 1){
                    $city = City_union_village::all();
                    $district = District::all();
                    return view('superadmin.city', compact('city', 'district'));
                }
            }

        }

        if($role->name == "ROLE_SUPERADMIN"){
            $city = City_union_village::all();
            $district = District::all();
            return view('superadmin.city', compact('city', 'district'));
        }
    }

    //City [Insert]
    public function insert_city(Request $request)
    {
        $city = new City_union_village();

        $city->city_union_villages_name_eng = $request->input('english');
        $city->city_union_villages_name_ban = $request->input('bangla');
        $city->districts = $request->input('districts');
        $city->type = $request->input('type');
        $city->status = $request->input('status');
        $city->soft_delete = "deactivate";
        $city->save();

        return redirect('/add_city')->with('message',"City Added successfully");
    }

    //edit_city_get(view)
    public function edit_city($id) {
        $city = City_union_village::find($id);

	    return response()->json([
	      'data' => $city
	    ]);
    }
    //edit_city_post(update)
    public function update_city(Request $request) {

        City_union_village::where('id',$request->ct_id)
        ->update([
            'city_union_villages_name_eng'=>$request->english,
            'city_union_villages_name_ban'=>$request->bangla,
            'districts'=>$request->district,
            'status'=>$request->status
        ]);

        return back()->with('message',"Successfully Updated");

    }

    //City [Delete]
    public function delete_city($id) {
        $city = City_union_village::find($id);
        $district = District::find($city->districts);
        if($district>"0"){
            return back()->with('error',"Without Deleting the Foreign Key Itself, Primary Key Can't be Deleted");
        }else
        $city->delete();
    return back()->with('message',"Successfully Deleted");
    }

    //City [Soft-Delete]
    public function softdelete_city($id)
    {
       $city = City_union_village::find($id);
       $city->soft_delete = "activate";
       $city->save();
       return back()->with('info',"Successfully Soft-deleted");

    }
    //City [Restore]
    public function restore_city($id)
    {
       $city = City_union_village::find($id);
       $city->soft_delete = "deactivate";
       $city->save();
       return back()->with('message',"Successfully Restored");
    }

    //City [Activate and Deactivate]
    public function city_activate($id) {
        City_union_village::find($id)->update([
            'status'=>1,
        ]);
        return back()->with('message',"successfully activated");
    }

    public function city_deactivate($id) {
        City_union_village::find($id)->update([
            'status'=>0,
        ]);
        return back()->with('message',"successfully De-Activated");
    }
}
