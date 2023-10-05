<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Country;
use App\Models\Division;
use App\Models\District;
use App\Models\City_union_village;
use App\Models\News_category;
use App\Models\SubCategories;
use App\Models\ChildSubCategories;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class NewsController extends Controller
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

        //dd("jksdk0");
        foreach($role_has_permission as $permission){

            if($role->name == "ROLE_ADMIN"){
                if($permission->permission == 10){
                    $news = News::all();

                    $country =  Country::all();
                    $division =  Division::all();
                    $district =  District::all();
                    $city =  City_union_village::all();
                    $category =  News_category::all();
                    $subcategory =  SubCategories::all();
                    $childSubCate =  ChildSubCategories::all();
                    return view('superadmin.news', compact('news','country','division','district','city','category','subcategory','childSubCate'));
                }
            }

        }

        if($role->name == "ROLE_SUPERADMIN"){
            $news = News::all();

            $country =  Country::all();
            $division =  Division::all();
            $district =  District::all();
            $city =  City_union_village::all();
            $category =  News_category::all();
            $subcategory =  SubCategories::all();
            $childSubCate =  ChildSubCategories::all();
            return view('superadmin.news', compact('news','country','division','district','city','category','subcategory','childSubCate'));
        }
    }
    //get_news
    public function get_news()
    {
        $news = News::all();

        $country =  Country::all();
        $division =  Division::all();
        $district =  District::all();
        $city =  City_union_village::all();
        $category =  News_category::all();
        $subcategory =  SubCategories::all();
        $childSubCate =  ChildSubCategories::all();

        return view('superadmin.insert_news', compact('news','country','division','district','city','category','subcategory','childSubCate'));
    }
    //insert_news
    public function create(Request $request)
    {
        try
        {
            $news = new News();

            if($request->hasfile('banner'))
            {

                $file = $request->file('banner');
                $text = $file->getClientOriginalExtension();
                $filename = time().'.'.$text;
                $file->move(public_path('news_banners/'),$filename);
                $news->banner = $filename;
            }

            $news->title_eng = $request->input('title_eng');
            $news->title_ban = $request->input('title_ban');
            $news->description_eng = $request->input('description_eng');
            $news->description_ban = $request->input('description_ban');
            $news->date = $request->input('news_date');
            $news->video_link = $request->input('video_link');
            $news->video_live = $request->input('live_video');
            $news->latest_news = $request->input('latest');
            $news->time_duration = $request->input('duration');
            $news->news_categories = $request->input('news_category');
            $news->sub_categories = $request->input('subCategory');
            $news->child_sub_categories = $request->input('childSubCategory');
            $news->countries = $request->input('country');
            $news->divisions = $request->input('division');
            $news->districts = $request->input('district');
            $news->city_union_villages = $request->input('city');

            $slug = Str::slug($request->input('title_eng'));
            $news->slug =  $slug;

            $news->status = $request->input('status');
            $news->soft_delete = "deactivate";
            $news->save();

            return redirect('/news')->with('message',"News added successfully");
        }catch(\Exception $e)
        {
            return back()->with([
                'alert-type'=>'error',
                'message' => $e->getMessage()
            ]);
        }
    }
    //edit_news_get(view)
    public function edit_newsGet($slug) {
        $news = News::where('slug', $slug)->first();


        //$news = News::all();
        $country =  Country::all();
        $division =  Division::all();
        $district =  District::all();
        $city =  City_union_village::all();
        $category =  News_category::all();
        $subcategory =  SubCategories::all();
        $childSubCate =  ChildSubCategories::all();

    return view('superadmin.update_news', compact('news','country','division','district','city','category','subcategory','childSubCate'));
    }

    public function slug_check($id, $title) {
        // echo $id;
        // echo $slug_title;

        $have_slug = 0;
        $slug = Str::slug($title);
        $news = News::where('slug', $slug)->first();

        if($news){
            $have_slug = 1;
        }
        else{
            $have_slug = 0;
        }

        return response()->json([
            'data' => $news,
            'data2' => $have_slug
          ]);
    }

    //edit_news_post(update)
    public function edit_newsPost(Request $request, $id)
    {
        try
        {
            $news = News::find($id);

            //dd($request->input('latest'));


        if($request->hasfile('banner'))
        {
            $path = 'news_banners/'.$news->banner;
            if(File::exists($path))
            {
               File::delete($path);
            }
            $file = $request->file('banner');
            $text = $file->getClientOriginalExtension();
            $filename = time().'.'.$text;
            $file->move(public_path('news_banners/'),$filename);
            $news->banner = $filename;
        }
        $news->title_eng = $request->input('title_eng');
        $news->title_ban = $request->input('title_ban');
        $news->description_eng = $request->input('description_eng');
        $news->description_ban = $request->input('description_ban');
        $news->date = $request->input('news_date');
        $news->video_link = $request->input('video_link');
        $news->video_live = $request->input('live_video');
        $news->latest_news = $request->input('latest');
        $news->time_duration = $request->input('duration');
        $news->news_categories = $request->input('news_category');
        $news->sub_categories = $request->input('subCategory');
        $news->child_sub_categories = $request->input('childSubCategory');
        $news->countries = $request->input('country');
        $news->divisions = $request->input('division');
        $news->districts = $request->input('district');
        $news->city_union_villages = $request->input('city');

        $slug = Str::slug($request->input('title_eng'));
        $news->slug =  $slug;

        $news->status = $request->input('status');
        $news->soft_delete = "deactivate";

        $news->update();
        return redirect('/news')->with('message',"News Updated successfully");
        }catch(\Exception $e)
        {
            return redirect('/news')->with('error', $e->getMessage());
        }
    }
    //news_active
    public function active_news($id) {
        News::find($id)->update([
            'status'=>"active",
        ]);
        return back()->with('message',"Successfully Activated");
    }
    //news_deactive
    public function deactive_news($id) {
        News::find($id)->update([
            'status'=>"deactive",
        ]);
        return back()->with('message',"Successfully De-Activated");
    }
    //soft_delete_news
    public function softdlt_news($id)
    {
       $news = News::find($id);
       $news->soft_delete = "activate";
       $news->save();
       return back()->with('info',"Soft-delete Successfully");

    }
    //restore_news
    public function restore_news($id)
    {
       $news = News::find($id);
       $news->soft_delete = "deactivate";
       $news->save();
       return back()->with('message',"News Restored Successfully");
    }
    //delete_news
    public function destroy($id)
    {
       $news = News::find($id);

       if($news->banner)

       $category = News_category::find($news->news_categories);
       $subcategory = SubCategories::find($news->sub_categories);
       $childSubCate = ChildSubCategories::find($news->child_sub_categories);
       $country = Country::find($news->countries);
       $division = Division::find($news->divisions);
       $district = District::find($news->districts);
       $city = City_union_village::find($news->city_union_villages);

       if($category > "0" && $subcategory > "0" && $childSubCate > "0" && $country > "0" && $division > "0" && $district > "0" && $city > "0")
        {
            return back()->with('error',"Can't be Deleted");
        }else {
            if($news->banner)

            {
                $path = 'news_banners/'.$news->banner;
                if(File::exists($path))
                {
                    File::delete($path);
                }
            }
        $news->delete();
        return back()->with('message',"Successfully Deleted");
        }
    }
}
