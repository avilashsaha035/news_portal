<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
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
    public function add_district()
    {
        $role_user = DB::table('role_user')->where('user_id', '=', Auth::user()->id)->first();
        $role = DB::table('roles')->where('id', '=', $role_user->role_id)->first();
        $role_has_permission = DB::table('role_has_permissions')->where('role', '=', $role_user->role_id)->get();

        //dd("jksdk0");
        foreach($role_has_permission as $permission){

            if($role->name == "ROLE_ADMIN"){
                if($permission->permission == 4){
                    $district = District::all();
                    $division = Division::all();
                    return view('superadmin.district', compact('district','division'));
                }
            }

        }

        if($role->name == "ROLE_SUPERADMIN"){
            $district = District::all();
            $division = Division::all();
            return view('superadmin.district', compact('district','division'));
        }
    }
    //insert_district
    public function insert_district(Request $request)
    {
        $district = new District();

        $district->district_name_eng = $request->input('english');
        $district->district_name_ban = $request->input('bangla');
        $district->divisions = $request->input('divisions');
        $district->status = $request->input('status');
        $district->soft_delete = "deactivate";
        $district->save();

        return redirect('/add_district')->with('message',"District Added Successfully");
    }
    //active_district
    public function active_district($id)
    {
        District::find($id)->update([
            'status'=>"active",
        ]);
        return back()->with('message',"Successfully Activated");
    }
    //de-active_district
    public function deactive_district($id)
    {
        District::find($id)->update([
            'status'=>"deactive",
        ]);
        return back()->with('message',"Successfully De-activated");
    }
    //edit_district_get(view)
    public function edit_district($id) {
        $district = District::find($id);

	    return response()->json([
	      'data' => $district
	    ]);
    }
    //edit_district_post(update)
    public function update_district(Request $request) {

        District::where('id',$request->ds_id)
        ->update([
            'district_name_eng'=>$request->english,
            'district_name_ban'=>$request->bangla,
            'divisions'=>$request->division,
            'status'=>$request->status
        ]);

        return back()->with('message',"Successfully Updated");

    }
    //soft_delete_district
    public function softdlt_district($id)
    {
       $district = District::find($id);
       $district->soft_delete = "activate";
       $district->save();
       return redirect('/add_district')->with('message',"Soft-deleted Successfully");

    }
    //restore_district
    public function restore_district($id)
    {
       $district = District::find($id);
       $district->soft_delete = "deactivate";
       $district->save();
       return redirect('/add_district')->with('message',"Restored Successfully");
    }
    //delete_district
    public function delete_district($id)
    {
       $district = District::find($id);
       $division = Division::find($district->divisions);
        if($division>"0"){
            return back()->with('error',"Without Deleting the Foreign Key Itself, Primary Key Can't be Deleted");
        }else
       $district->delete();
       return redirect('/add_district')->with('message',"District Deleted Successfully");

    }
}
