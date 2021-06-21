<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/navbar', function () {
    return view('layouts.navbar');
});
Route::get('/test', function () {
    return view('layouts.test');
});

Route::get('/now', function () {
 $now = Carbon::now();
    echo $now;  
});
##################### begain booking #########################

Route::group(['prefix'=>'booking'],function(){
    Route::get('create','BookingController@create')->name('ajax.booking.add');
    Route::get('table','BookingController@all')->name('table.show');
    Route::post('store','BookingController@store')->name('ajax.booking.store');
    Route::get('edit/{booking_id}', 'BookingController@edit')->name('ajax.booking.edit');
    Route::any('update', 'BookingController@update')->name('ajax.booking.update');
    Route::get('cost', 'BookingController@Cost')->name('ajax.booking.cost');
    Route::get('calculate', 'BookingController@Calculate')->name('ajax.booking.calculate');;
    Route::post('delete','BookingController@delete')->name('ajax.booking.delete');
    Route::get('checkin','BookingController@CheckIn')->name('ajax.booking.checkin');
    Route::get('search','BookingController@Search')->name('booking.search');
    

});
##################### end booking #########################
##################### start client #########################

Route::group(['prefix'=>'client'],function(){
Route::post('store','ClientController@store')->name('client.store');
});
#####################e end client #########################

Route::get('startup','StartupController@startup');
Route::get('profile/{user}', 'profileController@index')->name('profile.show');
Route::get('mail','mailController@SendMail')->name('SendMail');

   

Auth::routes();
