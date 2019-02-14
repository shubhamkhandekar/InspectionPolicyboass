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

Route::get('/','LoginController@login');
Route::get('logout','LoginController@logout');
Route::post('login-page','LoginController@login_page');
Route::get('log-out','LoginController@logout');

Route::group(['middleware' => ['CheckMidd']], function(){
Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('dashboard','DashboardController@dashboard');
Route::get('inspection-details','InspectionController@inspectiondetails');
Route::post('view-inspection-status','InspectionController@view_inspection_status');
Route::get('get_vehical_images/{vehicalid}','InspectionController@getvehicalimgaes');
Route::get('get_vehical_video/{vehicalid}','InspectionController@getvehicalvideo');
});