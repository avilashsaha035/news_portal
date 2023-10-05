<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RoleHasPermission;

class RoleController extends Controller
{
    //SuperAdmin
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_SUPERADMIN');
    }
    //Role Add
    public function get_roles()
    {
        $role = Role::all();
        $permission = Permission::all();
        $role_has_permissions = RoleHasPermission::where('role', 5)->get();

        //dd($role_has_permissions);
        //  foreach($role_has_permissions as $rhp){
        //     echo $rhp->role;
        //     echo $rhp->permission;
        //  }
        //exit;
        return view('superadmin.roles', compact('role'));
    }
    //insert_role
    public function insert_role(Request $request)
    {
        $role = new Role();

        $role->name = "ROLE_ADMIN";
        $role->role_type = $request->input('name');
        $role->description = $request->input('description');
        $role->soft_delete = "deactivate";
        $role->save();



        return redirect('/get_roles')->with('message',"Roles Added Successfully");
    }
    // //active_country
    // public function active_role($id)
    // {
    //     Country::find($id)->update([
    //         'status'=>"active",
    //     ]);
    //     return back()->with('message',"Successfully Activated");
    // }
    // //de-active_country
    // public function deactive_role($id)
    // {
    //     Country::find($id)->update([
    //         'status'=>"deactive",
    //     ]);
    //     return back()->with('message',"Successfully De-activated");
    // }
    //soft_delete_country
    public function softdlt_role($id)
    {
       $role = Role::find($id);
       $role->soft_delete = "activate";
       $role->save();
       return redirect('/get_roles')->with('info',"Soft-deleted Successfully");

    }
    //restore_country
    public function restore_role($id)
    {
       $role = Role::find($id);
       $role->soft_delete = "deactivate";
       $role->save();
       return redirect('/get_roles')->with('message',"Restored Successfully");
    }
    //delete_country
    public function delete_role($id)
    {
       $role = Role::find($id);
       $role->delete();
       return redirect('/get_roles')->with('message',"Deleted successfully");
    }
    //edit_role_get(view)
    public function edit_role($id) {
        $role = Role::find($id);
        $permission = Permission::all();
        $role_has_permission = RoleHasPermission::where('role', $id)->get();

	    return response()->json([
	      'data' => $role,
          'p_data' => $permission,
          'role_has_data' => $role_has_permission
	    ]);
    }
    //edit_role_post(update)
    public function update_role(Request $request) {

        $permission = Permission::all();

        foreach ($permission as $per){
              $requestname = "permission". $per->id;

              if($request->$requestname){
                $role_has_permission = RoleHasPermission::where('role', $request->r_id)->where('permission', $request->$requestname)->get();

                if($role_has_permission == "[]"){
                    $role_has_permission = new RoleHasPermission();

                    $role_has_permission->role = $request->r_id;
                    $role_has_permission->permission = $request->$requestname;
                    $role_has_permission->save();
                }
              }
              if(!$request->$requestname){
                //dd($request->permission6);
                $role_has_permission = RoleHasPermission::where('role', $request->r_id)->where('permission', $per->id)->first();

                if($role_has_permission){
                    //dd($role_has_permission);
                    $role_per = RoleHasPermission::find($role_has_permission->id);
                    $role_per->delete();
                }
              }
            //   if(!$request->$requestname){
            //     //dd($requestname);
            //     //echo $requestname;
            //     $role_has_permission = RoleHasPermission::where('role', $request->r_id)->where('permission', $request->$requestname)->get();
            //     if(!$role_has_permission){
            //         $role_has_permission = new RoleHasPermission();

            //         $role_has_permission->role = $request->r_id;
            //         $role_has_permission->permission = $request->$requestname;
            //         $role_has_permission->save();
            //     }
            //   }
            //   echo $role_has_permission;

            }
 //exit;
        Role::where('id',$request->r_id)
        ->update([
            'role_type'=>$request->name,
            'description'=>$request->description,
        ]);

        return back()->with('message',"Successfully Updated");

    }
}
