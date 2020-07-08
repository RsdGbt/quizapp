<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'frontend'],function(){

    Route::get('','HomeController@index');

});
Route::group(['middleware'=>'guest'],function(){
    Route::get('login','frontend\\LoginController@getLogin')->name('login');
    Route::post('login','frontend\\LoginController@postLogin');
    Route::post('loginAction','frontend\\LoginController@loginAction');
    Route::get('register','frontend\\MemberController@create');
    Route::post('register','frontend\\MemberController@store');
});
Route::any('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['namespace'=>'backend','middleware'=>'auth'],function(){

    Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>'admin'],function (){

        Route::get('','DashboardController@index');
        Route::get('edit-profile','DashboardController@edit');
        Route::post('edit-profile','DashboardController@update');
        Route::get('change-password','DashboardController@changePassword');
        Route::post('change-password','DashboardController@updatePassword');

        Route::group(['prefix'=>'categories','namespace'=>'category'],function (){
           Route::get('','CategoryController@index');
           Route::get('list-category','CategoryController@getList');
           Route::get('list-category/{id}/edit','CategoryController@edit');
           Route::post('list-category/{id}/edit','CategoryController@update');
           Route::get('add-category','CategoryController@create');
           Route::post('add-category','CategoryController@store');
        });

        Route::group(['prefix'=>'levels','namespace'=>'levels'],function (){
           Route::get('','LevelController@index');
           Route::get('list-level','LevelController@getList');
           Route::get('list-level/{id}/edit','LevelController@edit');
           Route::post('list-level/{id}/edit','LevelController@update');
           Route::get('add-level','LevelController@create');
           Route::post('add-level','LevelController@store');
        });

        Route::group(['prefix'=>'questions','namespace'=>'question'],function (){
           Route::get('','QuestionController@index');
           Route::get('list-question','QuestionController@getList');
           Route::get('add-question','QuestionController@create');
           Route::post('add-question','QuestionController@store');

            Route::get('list-question/{id}/edit','QuestionController@edit');
            Route::post('list-question/{id}/edit','QuestionController@update');
        });
        Route::group(['prefix'=>'answers','namespace'=>'answers'],function (){
           Route::get('','AnswerController@index');
            Route::get('list-answers','AnswerController@getList');
            Route::post('list-answers','AnswerController@store');
            Route::post('list-answers/{id}/update','AnswerController@update');
        });
    });

    Route::group(['prefix'=>'member','namespace'=>'member','middleware'=>'member'],function (){

        Route::get('','DashboardController@index');

    });

});

Route::group(['middleware'=>'auth'],function (){
    Route::get('{slug}','frontend\\GameController@index');
    Route::get('{slug}/{id}','frontend\\GameController@show');
    Route::post('{slug}/{id}','frontend\\GameController@store');
});
