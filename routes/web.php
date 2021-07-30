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

Route::get('/', function () {
    return redirect('reservations');
});

Auth::routes();
Route::get('check_role','HomeController@check_role');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/personal_information', function(){
	return view('admin/personal_information');
});
Route::post('/personal_information', 'HomeController@personal_information');
Route::get('/select_pain_type', 'HomeController@select_pain_type');
Route::post('/reservation', 'HomeController@reserve');
Route::get('/reservations', 'HomeController@reservations');
Route::get('/update_reservation/{reservation}', 'HomeController@update_reservation');
Route::post('/update_reservation/{reservation}', 'HomeController@reservation_update');
Route::get('/refused/{reservation}', 'HomeController@refused_reservation');
Route::post('/update_refused_reservation/{reservation}', 'HomeController@update_refused_reservation');
Route::get('/notifications', 'HomeController@notifications');
