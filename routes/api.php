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


/*Policy Boss*/
Route::post('vehicle-registration','ApiController@vehicle_registration');
Route::post('vehicle-documents','ApiController@vehicle_documents');
Route::post('vehicle-video-documents','ApiController@vehicle_video_documents');
Route::post('vehicle-inspection-details','ApiController@vehicle_inspection_details');
Route::post('vehicle-inspection-otp','ApiController@vehicle_inspection_otp');
Route::post('vehicle-inspection-verify-otp','ApiController@vehicle_inspection_verify_otp');
Route::post('vehicle-insurance-info','ApiController@vehicle_insurance_info');
Route::post('login','ApiController@login');

/*New*/
Route::post('vehicle-details','ApiController@vehicle_details');
Route::post('vehicle-info-details','ApiController@vehicle_info_details');


/*Get Customer Info*/
Route::get('generic-info','ApiController@generic_info');
Route::get('vehicle-info','ApiController@vehicle_info');