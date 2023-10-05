<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\DB;

class ReaderController extends Controller
{
    // ============================== Categorywise news ===========================================//
    public function post_details($slug)
    {

        $news = News::where('slug', $slug)->first();
        //dd($news);
        return view('post_details', compact('news'));
    }

    // ============================== Show Categorywise all news ===========================================//
    public function all_news($id)
    {
        $news = News::where('news_categories', $id)->get(['id', 'banner', 'title_ban', 'title_eng', 'news_categories','slug']);
        $category = News_category::find($id);
        return view('all_news', compact('category','news','id'));
    }

    // ============================== CONTACT US ===========================================//
    public function contactUs()
    {
        return view('contactUs');
    }

    // ============================== ABOUT US ===========================================//
    public function aboutUs()
    {
        return view('aboutUs');
    }

    // ============================== Terms & Condition ===========================================//
    public function terms()
    {
        return view('terms');
    }
}
