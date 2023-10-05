<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News_category;
use App\Models\SubCategories;
use App\Models\ChildSubCategories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChildSubCategoryController extends Controller
{
    //SuperAdmin
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

    public function add_child_subcategory()
    {


        $role_user = DB::table('role_user')->where('user_id', '=', Auth::user()->id)->first();
        $role = DB::table('roles')->where('id', '=', $role_user->role_id)->first();
        $role_has_permission = DB::table('role_has_permissions')->where('role', '=', $role_user->role_id)->get();

        //dd("jksdk0");
        foreach($role_has_permission as $permission){

            if($role->name == "ROLE_ADMIN"){
                if($permission->permission == 8){
                    $category = News_category::all();
                    $subcategory = SubCategories::all();
                    $childSubCate = ChildSubCategories::leftjoin('sub_categories as sc','sc.id','=','child_sub_categories.sub_categories')
                    ->leftjoin('news_categories as c','c.id','=','sc.news_categories')
                    ->select('child_sub_categories.id','sc.cate_title_eng as cat_name','child_sub_categories.cate_title_eng','child_sub_categories.cate_title_ban','child_sub_categories.status','child_sub_categories.soft_delete')
                    ->get();
                    return view('superadmin.child_subcategory', compact('childSubCate','category','subcategory'));
                }
            }

        }

        if($role->name == "ROLE_SUPERADMIN"){
            $category = News_category::all();
            $subcategory = SubCategories::all();
            $childSubCate = ChildSubCategories::leftjoin('sub_categories as sc','sc.id','=','child_sub_categories.sub_categories')
            ->leftjoin('news_categories as c','c.id','=','sc.news_categories')
            ->select('child_sub_categories.id','sc.cate_title_eng as cat_name','child_sub_categories.cate_title_eng','child_sub_categories.cate_title_ban','child_sub_categories.status','child_sub_categories.soft_delete')
            ->get();
            return view('superadmin.child_subcategory', compact('childSubCate','category','subcategory'));
        }
    }
    //insert_child-subcategory
    public function insert_child_subcategory(Request $request)
    {
        $childSubCate = new ChildSubCategories();

        $childSubCate->cate_title_eng = $request->input('english');
        $childSubCate->cate_title_ban = $request->input('bangla');
        $childSubCate->status = $request->input('status');
        $childSubCate->soft_delete = "deactivate";

        $childSubCate->news_categories = $request->input('news_categories');
        $childSubCate->sub_categories = $request->input('sub_categories');
        $childSubCate->save();

        return redirect('/add_child_subcategory')->with('message',"Category Added Successfully");
    }
    //edit_childSubCate_get(view)
    public function edit_child_subcategory($id) {
        $childSubCate = ChildSubCategories::find($id);

	    return response()->json([
	      'data' => $childSubCate
	    ]);
    }
    //edit_childSubCate_post(update)
    public function update_child_subcategory(Request $request) {

        ChildSubCategories::where('id',$request->cs_id)
        ->update([
            'cate_title_eng'=>$request->english,
            'cate_title_ban'=>$request->bangla,
            'news_categories'=>$request->news_categories,
            'sub_categories'=>$request->sub_categories,
            'status'=>$request->status
        ]);

        return back()->with('message',"Successfully Updated");

    }
    //active_child-subcategory
    public function active_child_subcategory($id)
    {
            ChildSubCategories::find($id)->update([
            'status'=>"active",
        ]);
        return back()->with('message',"Successfully Activated");
    }
    //de-active_child-subcategory
    public function deactive_child_subcategory($id)
    {
        ChildSubCategories::find($id)->update([
            'status'=>"deactive",
        ]);
        return back()->with('message',"Successfully De-activated");
    }
    //soft_delete_child-subcategory
    public function softdlt_child_subcategory($id)
    {
       $childSubCate = ChildSubCategories::find($id);
       $childSubCate->soft_delete = "activate";
       $childSubCate->save();
       return redirect('/add_child_subcategory')->with('info',"Soft-Delete Successfully");

    }
    //restore_child-subcategory
    public function restore_child_subcategory($id)
    {
       $childSubCate = ChildSubCategories::find($id);
       $childSubCate->soft_delete = "deactivate";
       $childSubCate->save();
       return redirect('/add_child_subcategory')->with('message',"Restored Successfully");
    }
    //delete_child-subcategory
    public function delete_child_subcategory($id)
    {
       $childSubCate = ChildSubCategories::find($id);
       $subcategory = SubCategories::find($childSubCate->sub_categories);
       if($subcategory>"0")
       {
           return back()->with('error',"Without Deleting the Foreign Key Itself, Primary Key Can't be Deleted");
       }else
       $childSubCate->delete();
       return redirect('/add_child_subcategory')->with('message',"Category Deleted Successfully");
    }
}
