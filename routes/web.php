<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\FacebookAuthController;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use App\Models\News;
use App\Models\Language;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $news = News::where('latest_news', "yes")->get();
    $newsbn = News::where('latest_news', "yes")->get();
    $news_latest_eng = News::where('latest_news', "yes")->get();
    $news_latest_ban = News::where('latest_news', "yes")->get();
    $news_gall = News::where('latest_news', "yes")->whereNotNull('video_link')->latest()->first();
    $news_gall2 = News::where('latest_news', "yes")->orderBy('created_at', 'desc')->skip(1)->take(1)->first();

    $news_slider_eng = News::where('latest_news', "yes")->get();
    $news_slider_ban = News::where('latest_news', "yes")->get();

    $language = Language::all();
    return view('welcome', compact('news','newsbn','language','news_latest_eng','news_latest_ban','news_gall','news_gall2','news_slider_eng','news_slider_ban'));
});

Auth::routes();

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackgoogle'])->name('google-callback');
Route::get('auth/facebook', [FacebookAuthController::class, 'redirect'])->name('facebook-auth');
Route::get('auth/facebook/call-back', [FacebookAuthController::class, 'callbackfacebook'])->name('facebook-callback');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');

Route::get('/superadmin', [App\Http\Controllers\SuperAdminController::class, 'index'])->name('superadmin.home');




Route::group([ 'middleware' => 'auth'], function()
{
     //==========================Role==================================//
     Route::get('/get_roles', [App\Http\Controllers\RoleController::class, 'get_roles'])->name('superadmin.get_roles');
     //insert
     Route::post('/insert-role', [App\Http\Controllers\RoleController::class, 'insert_role'])->name('superadmin.insert-role');
     //active
     Route::get('/role_activate/{id}', [App\Http\Controllers\RoleController::class, 'active_role'])->name('superadmin.active-role');
     //deactive
     Route::get('/role_deactivate/{id}', [App\Http\Controllers\RoleController::class, 'deactive_role'])->name('superadmin.deactive-role');
     //soft-delete
     Route::get('/role_softdlt/{id}', [App\Http\Controllers\RoleController::class, 'softdlt_role'])->name('superadmin.softdlt-role');
     //restore
     Route::get('/role_restore/{id}', [App\Http\Controllers\RoleController::class, 'restore_role'])->name('superadmin.restore-role');
     //permanent-delete
     Route::get('/role_delete/{id}', [App\Http\Controllers\RoleController::class, 'delete_role'])->name('superadmin.delete-role');
     //edit_get
     Route::get('/role_edit/{id}', [App\Http\Controllers\RoleController::class, 'edit_role'])->name('superadmin.edit-role');
     //edit_post
     Route::post('/role_update', [App\Http\Controllers\RoleController::class, 'update_role'])->name('superadmin.update-role');
     //==========================Role==================================//

     //==========================Role Permissions==================================//
     Route::get('/get_permission', [App\Http\Controllers\PermissionController::class, 'get_permission'])->name('superadmin.get_prermission');
     //insert
     Route::post('/insert-permission', [App\Http\Controllers\PermissionController::class, 'insert_permission'])->name('superadmin.insert-permission');
     //soft-delete
     Route::get('/permission_softdlt/{id}', [App\Http\Controllers\PermissionController::class, 'softdlt_permission'])->name('superadmin.softdlt-permission');
     //restore
     Route::get('/permission_restore/{id}', [App\Http\Controllers\PermissionController::class, 'restore_permission'])->name('superadmin.restore-permission');
     //permanent-delete
     Route::get('/permission_delete/{id}', [App\Http\Controllers\PermissionController::class, 'delete_permission'])->name('superadmin.delete-permission');
     //edit_get
     Route::get('/permission_edit/{id}', [App\Http\Controllers\PermissionController::class, 'edit_permission'])->name('superadmin.edit-permission');
     //edit_post
     Route::post('/permission_update', [App\Http\Controllers\PermissionController::class, 'update_permission'])->name('superadmin.update-permission');
     //==========================Role permission==================================//

     //==========================User Creation==================================//
     Route::get('/get_users', [App\Http\Controllers\UserController::class, 'get_users'])->name('superadmin.get_users');
     //insert
     Route::post('/insert-user', [App\Http\Controllers\UserController::class, 'insert_user'])->name('superadmin.insert-user');
     //active
     Route::get('/user_activate/{id}', [App\Http\Controllers\UserController::class, 'active_user'])->name('superadmin.active-user');
     //deactive
     Route::get('/user_deactivate/{id}', [App\Http\Controllers\UserController::class, 'deactive_user'])->name('superadmin.deactive-user');
     //soft-delete
     Route::get('/user_softdlt/{id}', [App\Http\Controllers\UserController::class, 'softdlt_user'])->name('superadmin.softdlt-user');
     //restore
     Route::get('/user_restore/{id}', [App\Http\Controllers\UserController::class, 'restore_user'])->name('superadmin.restore-user');
     //permanent-delete
     Route::get('/user_delete/{id}', [App\Http\Controllers\UserController::class, 'delete_user'])->name('superadmin.delete-user');
     //edit_get
     Route::get('/user_edit/{id}', [App\Http\Controllers\UserController::class, 'edit_user'])->name('superadmin.edit-user');
     //edit_post
     Route::post('/user_update', [App\Http\Controllers\UserController::class, 'update_user'])->name('superadmin.update-user');
     //==========================User Creation==================================//

    //======================Language================================//
    Route::get('/add_lang', [App\Http\Controllers\LanguageController::class, 'add_lang'])->name('superadmin.lang');
    //insert
    Route::post('/insert-language', [App\Http\Controllers\LanguageController::class, 'insert_lang'])->name('superadmin.insert-language');
    //delete
    Route::get('/delete-language/{id}', [App\Http\Controllers\LanguageController::class, 'delete_lang'])->name('superadmin.delete-language');
    //======================Language================================//

    //==========================Country==================================//
    Route::get('/add_country', [App\Http\Controllers\CountryController::class, 'add_country'])->name('superadmin.country');
    //insert
    Route::post('/insert-country', [App\Http\Controllers\CountryController::class, 'insert_country'])->name('superadmin.insert-country');
    //active
    Route::get('/country_activate/{id}', [App\Http\Controllers\CountryController::class, 'active_country'])->name('superadmin.active-country');
    //deactive
    Route::get('/country_deactivate/{id}', [App\Http\Controllers\CountryController::class, 'deactive_country'])->name('superadmin.deactive-country');
    //soft-delete
    Route::get('/country_softdlt/{id}', [App\Http\Controllers\CountryController::class, 'softdlt_country'])->name('superadmin.softdlt-country');
    //restore
    Route::get('/country_restore/{id}', [App\Http\Controllers\CountryController::class, 'restore_country'])->name('superadmin.restore-country');
    //permanent-delete
    Route::get('/country_delete/{id}', [App\Http\Controllers\CountryController::class, 'delete_country'])->name('superadmin.delete-country');
    //edit_get
    Route::get('/country_edit/{id}', [App\Http\Controllers\CountryController::class, 'edit_country'])->name('superadmin.edit-country');
    //edit_post
    Route::post('/country_update', [App\Http\Controllers\CountryController::class, 'update_country'])->name('superadmin.update-country');
    //==========================Country==================================//


    //=======================Division=======================//
    Route::get('/add_division', [App\Http\Controllers\DivisionController::class, 'add_division'])->name('superadmin.division');
    Route::post('/insert_division', [App\Http\Controllers\DivisionController::class, 'insert_division'])->name('superadmin.insert_division');
    Route::get('/delete_division/{id}', [App\Http\Controllers\DivisionController::class, 'delete_division'])->name('superadmin.delete_division');
    Route::get('/division_activate/{id}', [App\Http\Controllers\DivisionController::class, 'division_activate'])->name('division.activate');
    Route::get('/division_deactivate/{id}', [App\Http\Controllers\DivisionController::class, 'division_deactivate'])->name('division.deactivate');
    Route::get('/softdelete_division/{id}', [App\Http\Controllers\DivisionController::class, 'softdelete_division'])->name('superadmin.softdelete_division');
    Route::get('/restore_division/{id}', [App\Http\Controllers\DivisionController::class, 'restore_division'])->name('superadmin.restore_division');
    Route::get('/division_edit/{id}', [App\Http\Controllers\DivisionController::class, 'edit_division'])->name('superadmin.edit_division');
    Route::post('/division_update', [App\Http\Controllers\DivisionController::class, 'update_division'])->name('superadmin.update_division');
    //=======================Division=======================//



    //======================District======================//
    Route::get('/add_district', [App\Http\Controllers\DistrictController::class, 'add_district'])->name('superadmin.district');
    //insert
    Route::post('/insert-district', [App\Http\Controllers\DistrictController::class, 'insert_district'])->name('superadmin.insert-district');
    //active
    Route::get('/district_activate/{id}', [App\Http\Controllers\DistrictController::class, 'active_district'])->name('superadmin.active-district');
    //deactive
    Route::get('/district_deactivate/{id}', [App\Http\Controllers\DistrictController::class, 'deactive_district'])->name('superadmin.deactive-district');
    //edit_get
    Route::get('/district_edit/{id}', [App\Http\Controllers\DistrictController::class, 'edit_district'])->name('superadmin.edit-district');
    //edit_post
    Route::post('/district_update', [App\Http\Controllers\DistrictController::class, 'update_district'])->name('superadmin.update-district');
    //soft-delete
    Route::get('/district_softdlt/{id}', [App\Http\Controllers\DistrictController::class, 'softdlt_district'])->name('superadmin.softdlt-district');
    //restore
    Route::get('/district_restore/{id}', [App\Http\Controllers\DistrictController::class, 'restore_district'])->name('superadmin.restore-district');
    //permanent-delete
    Route::get('/district_delete/{id}', [App\Http\Controllers\DistrictController::class, 'delete_district'])->name('superadmin.delete-district');
    //========================District========================//


    //=========================City==============================//
    Route::get('/add_city', [App\Http\Controllers\CityController::class, 'add_city'])->name('superadmin.city');
    Route::post('/insert_city', [App\Http\Controllers\CityController::class, 'insert_city'])->name('superadmin.insert_city');
    Route::get('/delete_city/{id}', [App\Http\Controllers\CityController::class, 'delete_city'])->name('superadmin.delete_city');
    Route::get('/city_activate/{id}', [App\Http\Controllers\CityController::class, 'city_activate'])->name('city.activate');
    Route::get('/city_deactivate/{id}', [App\Http\Controllers\CityController::class, 'city_deactivate'])->name('city.deactivate');
    Route::get('/softdelete_city/{id}', [App\Http\Controllers\CityController::class, 'softdelete_city'])->name('superadmin.softdelete_city');
    Route::get('/restore_city/{id}', [App\Http\Controllers\CityController::class, 'restore_city'])->name('superadmin.restore_city');
    Route::get('/city_edit/{id}', [App\Http\Controllers\CityController::class, 'edit_city'])->name('superadmin.edit_city');
    Route::post('/city_update', [App\Http\Controllers\CityController::class, 'update_city'])->name('superadmin.update_city');
    //========================City================================//



    //====================News_categories========================//
    Route::get('/add_category', [App\Http\Controllers\NewsCategoryController::class, 'index'])->name('superadmin.category');
    //insert
    Route::post('/insert_category', [App\Http\Controllers\NewsCategoryController::class, 'create'])->name('superadmin.insert-category');
    //active
    Route::get('/category_activate/{id}', [App\Http\Controllers\NewsCategoryController::class, 'active_category'])->name('superadmin.active-category');
    //deactive
    Route::get('/category_deactivate/{id}', [App\Http\Controllers\NewsCategoryController::class, 'deactive_category'])->name('superadmin.deactive-category');
    //edit_get
    Route::get('/category_edit/{id}', [App\Http\Controllers\NewsCategoryController::class, 'edit_category'])->name('superadmin.edit-category');
    //edit_post
    Route::post('/category_update', [App\Http\Controllers\NewsCategoryController::class, 'update_category'])->name('superadmin.update-category');
    //soft-delete
    Route::get('/category_softdlt/{id}', [App\Http\Controllers\NewsCategoryController::class, 'softdlt_category'])->name('superadmin.softdlt-category');
    //restore
    Route::get('/category_restore/{id}', [App\Http\Controllers\NewsCategoryController::class, 'restore_category'])->name('superadmin.restore-category');
    //permanent-delete
    Route::get('/category_delete/{id}', [App\Http\Controllers\NewsCategoryController::class, 'destroy'])->name('superadmin.delete-category');
    //====================News_categories========================//



    //=========================Sub-Category==============================//
    Route::get('/add_subcategory', [App\Http\Controllers\SubCategoryController::class, 'index'])->name('superadmin.subcategory');
    Route::post('/insert_subcategory', [App\Http\Controllers\SubCategoryController::class, 'create'])->name('superadmin.insert_subcategory');
    Route::get('/subcategory_activate/{id}', [App\Http\Controllers\SubCategoryController::class, 'subcategory_activate'])->name('subcategory.activate');
    Route::get('/subcategory_deactivate/{id}', [App\Http\Controllers\SubCategoryController::class, 'subcategory_deactivate'])->name('subcategory.deactivate');
    Route::get('/subcategory_edit/{id}', [App\Http\Controllers\SubCategoryController::class, 'edit_subcategory'])->name('superadmin.edit_subcategory');
    Route::post('/subcategory_update', [App\Http\Controllers\SubCategoryController::class, 'update_subcategory'])->name('superadmin.update_subcategory');
    Route::get('/softdelete_subcategory/{id}', [App\Http\Controllers\SubCategoryController::class, 'softdelete_subcategory'])->name('superadmin.softdelete_subcategory');
    Route::get('/restore_subcategory/{id}', [App\Http\Controllers\SubCategoryController::class, 'restore_subcategory'])->name('superadmin.restore_subcategory');
    Route::get('/delete_subcategory/{id}', [App\Http\Controllers\SubCategoryController::class, 'destroy'])->name('superadmin.delete_subcategory');
    //========================Sub-Category================================//


    //=========================Child Sub-Category==============================//
    Route::get('/add_child_subcategory', [App\Http\Controllers\ChildSubCategoryController::class, 'add_child_subcategory'])->name('superadmin.child-subcategory');
    //insert
    Route::post('/insert_child_subcategory', [App\Http\Controllers\ChildSubCategoryController::class, 'insert_child_subcategory'])->name('superadmin.insert-childsubcategory');
    //active
    Route::get('/child_subcategory_activate/{id}', [App\Http\Controllers\ChildSubCategoryController::class, 'active_child_subcategory'])->name('activeChildSubCategory');
    //deactive
    Route::get('/child_subcategory_deactivate/{id}', [App\Http\Controllers\ChildSubCategoryController::class, 'deactive_child_subcategory'])->name('deactiveChildSubCategory');
    //soft-delete
    Route::get('/child_subcategory_softdlt/{id}', [App\Http\Controllers\ChildSubCategoryController::class, 'softdlt_child_subcategory'])->name('softdltChildSubCategory');
    //restore
    Route::get('/child_subcategory_restore/{id}', [App\Http\Controllers\ChildSubCategoryController::class, 'restore_child_subcategory'])->name('restoreChildSubCategory');
    //permanent-delete
    Route::get('/child_subcategory_delete/{id}', [App\Http\Controllers\ChildSubCategoryController::class, 'delete_child_subcategory'])->name('deleteChildSubCategory');
    //edit_get
    Route::get('/child_subcategory_edit/{id}', [App\Http\Controllers\ChildSubCategoryController::class, 'edit_child_subcategory'])->name('superadmin.edit-child_subcategory');
    //edit_post
    Route::post('/child_subcategory_update', [App\Http\Controllers\ChildSubCategoryController::class, 'update_child_subcategory'])->name('superadmin.update-child_subcategory');
    //=========================Child Sub-Category==============================//

    //=========================Web Settings==============================//
    Route::get('/add_websettings', [App\Http\Controllers\WebSettingsController::class, 'add_websettings'])->name('superadmin.websettings');
    Route::post('/insert_websettings', [App\Http\Controllers\WebSettingsController::class, 'insert_websettings'])->name('superadmin.insert_websettings');
    Route::get('/websettings_edit/{id}', [App\Http\Controllers\WebSettingsController::class, 'edit_websettings'])->name('superadmin.edit_websettings');
    Route::post('/websettings_update', [App\Http\Controllers\WebSettingsController::class, 'update_websettings'])->name('superadmin.update_websettings');
    Route::get('/delete_websettings/{id}', [App\Http\Controllers\WebSettingsController::class, 'delete_websettings'])->name('superadmin.delete_websettings');
    Route::get('/softdelete_websettings/{id}', [App\Http\Controllers\WebSettingsController::class, 'softdelete_websettings'])->name('superadmin.softdelete_websettings');
    Route::get('/restore_websettings/{id}', [App\Http\Controllers\WebSettingsController::class, 'restore_websettings'])->name('superadmin.restore_websettings');
    //=========================Web Settings==============================//


    //========================= N E W S ==============================//
    Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news');
    //insertion_form
    Route::get('/get_news', [App\Http\Controllers\NewsController::class, 'get_news'])->name('getNews');
    //insert
    Route::post('/insert_news', [App\Http\Controllers\NewsController::class, 'create'])->name('newsInsert');
    //active
    Route::get('/news_activate/{id}', [App\Http\Controllers\NewsController::class, 'active_news'])->name('activeNews');
    //deactive
    Route::get('/news_deactivate/{id}', [App\Http\Controllers\NewsController::class, 'deactive_news'])->name('deactiveNews');
    //edit_get
    Route::get('/news_edits-{slug}', [App\Http\Controllers\NewsController::class, 'edit_newsGet'])->name('edit_newsGet');
    //slug_check
    Route::get('/slug_check/{id}-{title}', [App\Http\Controllers\NewsController::class, 'slug_check'])->name('slug_check');
    //edit_post
    Route::post('/news_edit{id}', [App\Http\Controllers\NewsController::class, 'edit_newsPost'])->name('edit_newsPost');
    //soft-delete
    Route::get('/news_softdlt/{id}', [App\Http\Controllers\NewsController::class, 'softdlt_news'])->name('softdltNews');
    //restore
    Route::get('/news_restore/{id}', [App\Http\Controllers\NewsController::class, 'restore_news'])->name('restoreNews');
    //permanent-delete
    Route::get('/news_delete/{id}', [App\Http\Controllers\NewsController::class, 'destroy'])->name('deleteNews');
    //========================= N E W S ==============================//
});


// ********************************* F r o n t e n d - V i e w ******************************************//


// ============================== Categorywise news ===========================================//
Route::get('/post_details-{slug}', [App\Http\Controllers\ReaderController::class, 'post_details'])->name('post_details');

// ============================== Show Categorywise all news ===========================================//
Route::get('/all_news-{id}', [App\Http\Controllers\ReaderController::class, 'all_news'])->name('all_news');

// ============================== CONTACT US ===========================================//
Route::get('/contactUs', [App\Http\Controllers\ReaderController::class, 'contactUs'])->name('contactUs');

// ============================== ABOUT US ===========================================//
Route::get('/aboutUs', [App\Http\Controllers\ReaderController::class, 'aboutUs'])->name('aboutUs');

// ============================== Terms & Condition ===========================================//
Route::get('/terms', [App\Http\Controllers\ReaderController::class, 'terms'])->name('terms');
