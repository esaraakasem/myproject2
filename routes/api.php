<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1','namespace'=>'Api'],function(){
    
   
    Route::get('governments','mainController@governments');
    
    Route::get('cities','mainController@cities');
    
    Route::Post('register','AuthController@register');
    
    Route::Post('login','AuthController@login');
    
    Route::Post('profile','AuthController@profile');
    
    Route::get('posts','mainController@posts');
    
    Route::get('catogeries','mainController@catogery');
     
    Route::get('donationrequest','mainController@donationrequest');
    
    Route::get('detailpost','mainController@detailpost');
      
    Route::get('detailsdonationrequest','mainController@detailsdonationrequest');
    
    Route::Post('create_donationrequest','mainController@createdonationrequest');
    
    Route::get('bloods','mainController@bloods');
    
    Route::get('setting','mainController@settings');
    
    Route::Post('registertoken','mainController@registertoken');
     
     Route::Post('report','mainController@report');
     
    Route::Post('contact','mainController@contact');
     
     Route::get('notification','mainController@notification');
});
