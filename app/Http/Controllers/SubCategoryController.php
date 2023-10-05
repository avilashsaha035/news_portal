<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Models\News_category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
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

    //Sub-Category [Add]
    public function index()
    {
        $subcategory = SubCategories::all();
        $category = News_category::all();
        return view('superadmin.subcategory', compact('subcategory', 'category'));
    }

    //Sub-Category [Insert]
    public function create(Request $request)
    {
        $role_user = DB::table('role_user')->where('user_id', '=', Auth::user()->id)->first();
        $role = DB::table('roles')->where('id', '=', $role_user->role_id)->first();
        $role_has_permission = DB::table('role_has_permissions')->where('role', '=', $role_user->role_id)->get();

        //dd("jksdk0");
        foreach($role_has_permission as $permission){

            if($role->name == "ROLE_ADMIN"){
                if($permission->permission == 7){
                    $subcategory = new SubCategories();

                    $subcategory->cate_title_eng = $request->input('english');
                    $subcategory->cate_title_ban = $request->input('bangla');
                    $subcategory->news_categories = $request->input('news_categories');
                    $subcategory->status = $request->input('status');
                    $subcategory->soft_delete = "deactivate";
                    $subcategory->save();
                    return redirect('/add_subcategory')->with('message',"Sub-Category Added Successfully");
                }
            }

        }

        if($role->name == "ROLE_SUPERADMIN"){
            $subcategory = new SubCategories();

            $subcategory->cate_title_eng = $request->input('english');
            $subcategory->cate_title_ban = $request->input('bangla');
            $subcategory->news_categories = $request->input('news_categories');
            $subcategory->status = $request->input('status');
            $subcategory->soft_delete = "deactivate";
            $subcategory->save();
            return redirect('/add_subcategory')->with('message',"Sub-Category Added Successfully");
        }
    }

     //edit_subcategory_get(view)
     public function edit_subcategory($id) {
        $subcategory = SubCategories::find($id);

	    return response()->json([
	      'data' => $subcategory
	    ]);
    }
    //edit_subcategory_post(update)
    public function update_subcategory(Request $request) {

        SubCategories::where('id',$request->sc_id)
        ->update([
            'cate_title_eng'=>$request->english,
            'cate_title_ban'=>$request->bangla,
            'news_categories'=>$request->category,
            'status'=>$request->status
        ]);

        return back()->with('message',"Successfully Updated");

    }

    //Sub-Category [Soft-Delete]
    public function softdelete_subcategory($id)
    {
       $subcategory = SubCategories::find($id);
       $subcategory->soft_delete = "activate";
       $subcategory->save();
       return back()->with('message',"Successfully Soft-deleted");

    }
    //Sub-Category [Restore]
    public function restore_subcategory($id)
    {
       $subcategory = SubCategories::find($id);
       $subcategory->soft_delete = "deactivate";
       $subcategory->save();
       return back()->with('message',"Successfully Restored");
    }

    //Sub-Category [Delete]
    public function destroy($id) {
        $subcategory = SubCategories::find($id);
        $category = News_category::find($subcategory->news_categories);
        if($category>"0")
        {
            return back()->with('error',"Without Deleting the Foreign Key Itself, Primary Key Can't be Deleted");
        }else
        $subcategory->delete();
    return back()->with('message',"Successfully Deleted");
    }

    //Sub-Category [Activate and Deactivate]
    public function subcategory_activate($id) {
        SubCategories::find($id)->update([
            'status'=>"active",
        ]);
        return back()->with('message',"Successfully Activated");
    }

    public function subcategory_deactivate($id) {
        SubCategories::find($id)->update([
            'status'=>"deactive",
        ]);
        return back()->with('message',"Successfully De-Activated");
    }
}
