<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News_category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsCategoryController extends Controller
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

    public function index()
    {
        $role_user = DB::table('role_user')->where('user_id', '=', Auth::user()->id)->first();
        $role = DB::table('roles')->where('id', '=', $role_user->role_id)->first();
        $role_has_permission = DB::table('role_has_permissions')->where('role', '=', $role_user->role_id)->get();


        foreach($role_has_permission as $permission){

            if($role->name == "ROLE_ADMIN"){
                if($permission->permission == 6){
                    $category = News_category::all();
                    return view('superadmin.news_categories', compact('category'));
                }
            }

        }

        if($role->name == "ROLE_SUPERADMIN"){
            $category = News_category::all();
            return view('superadmin.news_categories', compact('category'));
        }
    }
    //insert_category
    public function create(Request $request)
    {
        $category = new News_category();

        $category->cate_title_eng = $request->input('english');
        $category->cate_title_ban = $request->input('bangla');
        $category->status = $request->input('status');
        $category->soft_delete = "deactivate";
        $category->save();

        return redirect('/add_category')->with('message',"Category Added Successfully");
    }
    //active_category
    public function active_category($id)
    {
        News_category::find($id)->update([
            'status'=>"active",
        ]);
        return back()->with('message',"Successfully Activated");
    }
    //de-active_category
    public function deactive_category($id)
    {
        News_category::find($id)->update([
            'status'=>"deactive",
        ]);
        return back()->with('message',"Successfully De-activated");
    }
    //edit_newsCategory_get(view)
    public function edit_category($id) {
        $category = News_category::find($id);

	    return response()->json([
	      'data' => $category
	    ]);
    }
    //edit_newsCategory_post(update)
    public function update_category(Request $request) {

        News_category::where('id',$request->nc_id)
        ->update([
            'cate_title_eng'=>$request->english,
            'cate_title_ban'=>$request->bangla,
            'status'=>$request->status
        ]);

        return back()->with('message',"Successfully Updated");

    }
    //soft_delete_category
    public function softdlt_category($id)
    {
       $category = News_category::find($id);
       $category->soft_delete = "activate";
       $category->save();
       return redirect('/add_category')->with('message',"Category Deleted Successfully");

    }
    //restore_category
    public function restore_category($id)
    {
       $category = News_category::find($id);
       $category->soft_delete = "deactivate";
       $category->save();
       return redirect('/add_category')->with('message',"Category Deleted Successfully");
    }
    //delete_category
    public function destroy($id)
    {
       $category = News_category::find($id);
       $category->delete();
       return redirect('/add_category')->with('message',"Category Deleted Successfully");
    }
}
