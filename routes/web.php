<?php

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
Auth::routes(['verify' => true]);



Route::group(['middleware'=>'Maintenance'],function(){
    Route::group(['middleware'=>'verified'],function(){
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('account/setting','HomeController@account_setting');
        Route::post('account/setting','HomeController@account_setting_update');
        Route::get('profile','HomeController@index');

        Route::get('mailchimp','HomeController@mailchimp_subscribe');
        Route::post('mailchimp','HomeController@mailchimp_subscribe_post');

    });

    Route::get('/', function () {
        return view('frontend.home');
    });

    Route::post('send/message','HomeController@send_message');
});














Route::get('front_lang/{lang}',function ($lang){
    if(session()->has('front_lang')){
        session()->forget('front_lang');
    }
    if($lang == 'ar'){
        session()->put('front_lang','ar');
    }else{
        session()->put('front_lang','en');
    }
    return back();
});
Route::get('maintenance',function(){
    if(setting()->status == 'open'){
        return redirect('/');
    }
    return view('frontend.maintenance');
});


