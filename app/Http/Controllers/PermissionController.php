<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //SuperAdmin
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_SUPERADMIN');
    }
    //Permission Add
    public function get_permission()
    {
        $permission = Permission::all();
        $role = Role::all();
        // dd($role);
        return view('superadmin.role_permissions', compact('permission','role'));
    }
    //insert_permisssion
    public function insert_permission(Request $request)
    {
        //dd('hi');
        $permission = new Permission();

        $permission->name = $request->input('name');
        $permission->icon = $request->input('icon');
        $permission->route = $request->input('route');
        $permission->soft_delete = "deactivate";
        // $permission->role = $request->input('name');
        // $permission->user = $request->input('description');
        $permission->save();

        return redirect('/get_permission')->with('message',"Roles Added Successfully");
    }

    //soft_delete_permission
    public function softdlt_permission($id)
    {
       $role = Permission::find($id);
       $role->soft_delete = "activate";
       $role->save();
       return redirect('/get_permission')->with('info',"Soft-deleted Successfully");

    }
    //restore_permission
    public function restore_permission($id)
    {
       $role = Permission::find($id);
       $role->soft_delete = "deactivate";
       $role->save();
       return redirect('/get_permission')->with('message',"Restored Successfully");
    }
    //delete_permission
    public function delete_permission($id)
    {
       $role = Permission::find($id);
       $role->delete();
       return redirect('/get_permission')->with('message',"Deleted successfully");
    }

    //edit_permission_get(view)
    public function edit_permission($id) {
        $role = Permission::find($id);

	    return response()->json([
	      'data' => $role
	    ]);
    }
    //edit_permission_post(update)
    public function update_permission(Request $request) {

        Permission::where('id',$request->p_id)
        ->update([
            'name'=>$request->Pr_name,
            'icon'=>$request->Pr_icon,
            'route'=>$request->Pr_route,
        ]);

        return back()->with('message',"Successfully Updated");

    }

}
