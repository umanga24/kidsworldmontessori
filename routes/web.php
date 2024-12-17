<?php

use App\Http\Controllers\Front\DefaultController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('command', function () {

    /* php artisan migrate */
    \Artisan::call('config:cache');
   // dd("Done");
});

Route::group(['namespace' => 'Admin'], function () {
    Route::get('login', 'LoginController@login')->name('login');
    Route::post('postLogin', 'LoginController@postLogin')->name('postLogin');
    Route::get('password-reset', 'PasswordResetController@resetForm')->name('password-reset');
    Route::post('send-email-link', 'PasswordResetController@sendEmailLink')->name('sendEmailLink');
    Route::get('reset-password/{token}', 'PasswordResetController@passwordResetForm')->name('passwordResetForm');
    Route::post('update-password', 'PasswordResetController@updatePassword')->name('updatePassword');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::resource('dashboard', 'DashboardController');
    Route::get('logout', 'LoginController@Logout')->name('logout');
    Route::resource('project', 'ServiceController');
    Route::resource('news', 'NewsController');
    Route::resource('notice', 'NoticeController');
    Route::resource('gallery', 'GalleryController');
    Route::resource('team', 'TeamController');
    Route::resource('product', 'ProductController');
    Route::resource('download', 'DownloadController');
    Route::resource('slider', 'SliderController');
    Route::resource('page', 'PageController');
    Route::resource('setting', 'SettingController');
    Route::resource('rate', 'RateController');
    Route::resource('financial-information', 'FinancialInformationController');
    Route::resource('application', 'ApplicationController');
    Route::resource('contact', 'ContactController');
    Route::resource('branch', 'BranchController');
    Route::resource('blog', 'BlogController');
    Route::resource('report','ReportController');
    Route::post('gallerydetail/store', 'GalleryDetailController@store')->name('gallerydetail.store');
    Route::delete('gallerydetail/destroy', 'GalleryDetailController@destroy')->name('gallerydetail.destroy');

   


    Route::resource('gallerydetail', 'GalleryDetailController')->names([
    'index' => 'gallerydetail.index',
    'create' => 'gallerydetail.create'
    
    // other route names
]);

});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['namespace' => 'Front'], function () {
    Route::get('/', 'DefaultController@index')->name('home');
    Route::get('news', 'DefaultController@news')->name('news');
    Route::get('shareholders', 'DefaultController@shareHolder')->name('branch');
    Route::get('rate/{slug}', 'DefaultController@rates')->name('rates');
    Route::get('news/{slug}', 'DefaultController@newsInner')->name('newsInner');
    Route::get('notices', 'DefaultController@allNotices')->name('allNotices');
    Route::get('notice/{slug}', 'DefaultController@noticeInner')->name('noticeInner');
    Route::get('financial-information/{slug}', 'DefaultController@financialInformation')->name('financialInformation');
    Route::get('contact-us', 'DefaultController@contactUs')->name('contactUs');
    Route::post('save-contact', 'DefaultController@saveContact')->name('saveContact');
    Route::get('gallery', 'DefaultController@gallery')->name('gallery');
    Route::get('reports', 'DefaultController@reports')->name('reports');
    Route::get('career/{id}', 'DefaultController@careerDetail')->name('careerDetail');
    Route::get('apply/{id}', 'DefaultController@applyNow')->name('applyNow');
    Route::post('save-account', 'DefaultController@saveAccount')->name('saveAccount');
    Route::get('teams', 'DefaultController@teams')->name('teams');
    Route::get('accounts', 'DefaultController@accounts')->name('accounts');
    Route::get('request-account-login', 'DefaultController@createAccount')->name('create-account');
    Route::get('blogs', 'DefaultController@blogs')->name('blogs');
    Route::get('blog/{slug}', 'DefaultController@blogDetails')->name('blogDetails');
    Route::get('project/{slug}', 'DefaultController@serviceInner')->name('serviceInner');
    Route::get('gallerydetail/{id}', 'DefaultController@gallerydetail')->name('gallerydetail');


    Route::get('downloads', 'DefaultController@downloads')->name('downloads');
    Route::get('product/{slug}', 'DefaultController@productInner')->name('productInner');
    Route::get('emi-calculator', 'DefaultController@emiCalculator')->name('emiCalculator');
    Route::get('/{slug}', 'DefaultController@page')->name('page');
    Route::get('galleries', 'DefaultController@galleries')->name('galleries');
    Route::get('test', 'DefaultController@test')->name('test');
    //Route::get('reports', 'DefaultController@report')->name('report');
    
});
