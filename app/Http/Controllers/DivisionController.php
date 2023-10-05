<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DivisionController extends Controller
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
    //Division [Add]
    public function add_division()
    {
        $role_user = DB::table('role_user')->where('user_id', '=', Auth::user()->id)->first();
        $role = DB::table('roles')->where('id', '=', $role_user->role_id)->first();
        $role_has_permission = DB::table('role_has_permissions')->where('role', '=', $role_user->role_id)->get();

        //dd("jksdk0");
        foreach($role_has_permission as $permission){

            if($role->name == "ROLE_ADMIN"){
                if($permission->permission == 3){
                    $division = Division::all();
                    $country = Country::all();
                    return view('superadmin.division', compact('division', 'country'));
                }
            }

        }

        if($role->name == "ROLE_SUPERADMIN"){
            $division = Division::all();
            $country = Country::all();
            return view('superadmin.division', compact('division', 'country'));
        }
    }

    //Division [Insert]
    public function insert_division(Request $request)
    {
        $division = new Division();

        $division->division_name_eng = $request->input('english');
        $division->division_name_ban = $request->input('bangla');
        $division->countries = $request->input('countries');
        $division->status = $request->input('status');
        $division->soft_delete = "deactivate";
        $division->save();

        return redirect('/add_division')->with('message',"Division Added Successfully");
    }

    //edit_division_get(view)
    public function edit_division($id) {
        $division = Division::find($id);

	    return response()->json([
	      'data' => $division
	    ]);
    }
    //edit_division_post(update)
    public function update_division(Request $request) {

        Division::where('id',$request->d_id)
        ->update([
            'division_name_eng'=>$request->english,
            'division_name_ban'=>$request->bangla,
            'countries'=>$request->country,
            'status'=>$request->status
        ]);

        return back()->with('success',"Successfully Updated");

    }

    //Division [Delete]
    public function delete_division($id) {

        $division = Division::find($id);
        $country = Country::find($division->countries);
        if($country>"0"){
            return back()->with('error',"Without Deleting the Foreign Key Itself, Primary Key Can't be Deleted");
        }else
        $division->delete();
    return back()->with('success',"Successfully Deleted");
    }

    //Division [Soft-Delete]
    public function softdelete_division($id)
    {
       $division = Division::find($id);
       $division->soft_delete = "activate";
       $division->save();
       return back()->with('success',"Successfully Soft-deleted");

    }
    //Division [Restore]
    public function restore_division($id)
    {
       $division = Division::find($id);
       $division->soft_delete = "deactivate";
       $division->save();
       return back()->with('success',"Successfully Restored");
    }

    //Division [Activate and Deactivate]
    public function division_activate($id) {
        Division::find($id)->update([
            'status'=>1,
        ]);
        return back()->with('success',"Successfully Activated");
    }

    public function division_deactivate($id) {
        Division::find($id)->update([
            'status'=>0,
        ]);
        return back()->with('success',"Successfully De-activated");
    }
}
