<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware'=>['api','checkPassword'],'namespace'=>'Api'],function(){
Route::get('getclient','ApiController@Getclient');
Route::get('getbooking','ApiController@Getbooking');
Route::get('getworkspace','ApiController@Getworkspace');
Route::get('getrequest','ApiController@Getrequest');
Route::post('saveReservation','ApiController@saveReservation');
Route::post('saveClient','ApiController@saveClient');
Route::get('searchWorkspace','ApiController@searchWorkspace');


});
