<?php


use App\model\RelatedRegulations;

Route::group(['prefix'=>'admin_panel'],function(){

    config('auth.defines','admin');

    Route::get('login','AdminAuthController@login');
    Route::post('login','AdminAuthController@do_login');

    Route::get('forget/password','AdminAuthController@forget_password');
    Route::post('forget/password','AdminAuthController@forget_password_post');

    Route::get('reset/password/{token}','AdminAuthController@reset_password');
    Route::post('reset/password/{token}','AdminAuthController@reset_password_final');
    Route::group(['middleware'=>'admin:admin'],function (){


        Route::get('admins/export', 'AdminController@export');
        Route::get('admins/import', 'AdminController@import_view');
        Route::post('admins/import', 'AdminController@import');
        Route::resource('admins','AdminController');
        Route::delete('admins/destroy/all','AdminController@multi_delete');


        Route::get('setting','SettingController@setting');
        Route::post('setting','SettingController@setting_save');


        Route::get('users/export', 'UserController@export');
        Route::get('users/import', 'UserController@import_view');
        Route::post('users/import', 'UserController@import');
        Route::resource('users','UserController');
        Route::delete('users/destroy/all','UserController@multi_delete');


        Route::get('regulations/export', 'RegulationsController@export');
        Route::get('regulations/import', 'RegulationsController@import_view');
        Route::post('regulations/import', 'RegulationsController@import');
        Route::post('regulations/search', 'RegulationsController@search');
        Route::resource('regulations','RegulationsController');
        Route::delete('regulations/destroy/all','RegulationsController@multi_delete');


        Route::get('permits/export', 'PermitsController@export');
        Route::get('permits/import', 'PermitsController@import_view');
        Route::post('permits/import', 'PermitsController@import');
        Route::post('permits/search', 'PermitsController@search');
        Route::resource('permits','PermitsController');
        Route::delete('permits/destroy/all','PermitsController@multi_delete');


        Route::get('related/regulations/export', 'RelatedRegulationsController@export');
        Route::get('related/regulations/import', 'RelatedRegulationsController@import_view');
        Route::post('related/regulations/import', 'RelatedRegulationsController@import');
        Route::resource('related/regulations','RelatedRegulationsController');
        Route::delete('related/regulations/destroy/all','RelatedRegulationsController@multi_delete');

        Route::get('question/export', 'AssessmentQuestionController@export');
        Route::get('question/import', 'AssessmentQuestionController@import_view');
        Route::post('question/import', 'AssessmentQuestionController@import');
        Route::post('question/search', 'AssessmentQuestionController@search');
        Route::resource('question','AssessmentQuestionController');
        Route::delete('question/destroy/all','AssessmentQuestionController@multi_delete');


        Route::get('related/question/export', 'RelatedQuestionController@export');
        Route::get('related/question/import', 'RelatedQuestionController@import_view');
        Route::post('related/question/import', 'RelatedQuestionController@import');
        Route::resource('related/question','RelatedQuestionController');
        Route::delete('related/question/destroy/all','RelatedQuestionController@multi_delete');



        Route::get('related/permits/export', 'RelatedPermitsController@export');
        Route::get('related/permits/import', 'RelatedPermitsController@import_view');
        Route::post('related/permits/import', 'RelatedPermitsController@import');
        Route::resource('related/permits','RelatedPermitsController');
        Route::delete('related/permits/destroy/all','RelatedPermitsController@multi_delete');

        Route::get('/form-groups', function () {
            return view('form-groups');
        });
        Route::get('lang/{lang}',function ($lang){
            if(session()->has('lang')){
                session()->forget('lang');
            }
            if($lang == 'ar'){
                session()->put('lang','ar');
            }else{
                session()->put('lang','en');
            }
            return back();
        });

        Route::get('/',function (){
            return view('index');
        });

        Route::any('logout','AdminAuthController@logout');

        Route::get('test',function (){
            return RelatedRegulations::query()->with('regulations')->select('related_regulations.*')->get();
        });

    });


});
