<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    //SuperAdmin
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_SUPERADMIN');
    }
    //User Add
    public function get_users()
    {
        $user = User::all();
        $role = Role::all();
        // dd($role);
        return view('superadmin.users', compact('user','role'));
    }
    //user_role
    public function insert_user(Request $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->soft_delete = "deactivate";
        $user->save();

        $role_user = DB::table('users')->where('email', '=', $request->email)->first();

        DB::table('role_user')->insert(
            array(
                   'role_id'     =>   $request->input('userRole'),
                   'user_id'   =>   $role_user->id
            )
       );

        return redirect('/get_users')->with('message',"Users Added Successfully");
    }

    //edit_user_get(view)
    public function edit_user($id) {
        $user = User::find($id);

        $role_user = DB::table('role_user')->where('user_id', '=', $id)->first();

	    return response()->json([
	      'data' => $user,
          'rl_data' => $role_user
	    ]);
    }

    //edit_user_post(update)
    public function update_user(Request $request) {

        DB::table('role_user')->where('user_id',$request->us_id)->update(array(
            'role_id'=>$request->userRole,
        ));

        if($request->input('password')){
            User::where('id',$request->us_id)
            ->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=> Hash::make($request->input('password'))
            ]);
        }
        else{
            User::where('id',$request->us_id)
            ->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
        }

        return back()->with('message',"Successfully Updated");
    }
}
