<?php

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

Route::get('/', 'FrontController@index')->name('/.index');


Auth::routes();
Route::group(['middleware'=>'auth','prefix'=>'admin'],function (){
    
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('setting','SettingController');

    Route::resource('connect','ConnectController');
    
     Route::resource('catogery','CatogeryController');
     
      Route::resource('government','GovernmentController');
      
       Route::resource('donation','DonationController');
       
       Route::resource('city','CityController');
           
      Route::resource('report','ReportController');
      
        Route::resource('post','PostController');
      

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

