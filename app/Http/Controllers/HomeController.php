<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use App\Models\Language;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_role = DB::table('role_user')->where('user_id', '=', Auth::user()->id)->first();

        if($user_role){
            $role = DB::table('roles')->where('id', '=', $user_role->role_id)->first();
            if($role->name == "ROLE_SUPERADMIN"){
                //dd("SuperAdmin");
                return redirect()->route('superadmin.home');
            }
            if($role->name == "ROLE_ADMIN"){
                //dd("Admin");
                return redirect()->route('admin.home');
            }
        }


        $news = News::where('latest_news', "yes")->get();
        $newsbn = News::where('latest_news', "yes")->get();
        $news_latest_eng = News::where('latest_news', "yes")->get();
        $news_latest_ban = News::where('latest_news', "yes")->get();
        $news_gall = News::where('latest_news', "yes")->whereNotNull('video_link')->latest()->first();
        $news_gall2 = News::where('latest_news', "yes")->orderBy('created_at', 'desc')->skip(1)->take(1)->first();

        $news_slider_eng = News::where('latest_news', "yes")->get();
        $news_slider_ban = News::where('latest_news', "yes")->get();

        $language = Language::all();


        //dd($role->name);
        return view('home', compact('news','newsbn','language','news_latest_eng','news_latest_ban','news_gall','news_gall2','news_slider_eng','news_slider_ban'));
    }
}
