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

// Route::get('/', function () {
//     return view('user.user_main');
// });
Route::post('/genrate-report', 'TruckReportController@RecievedReport')->name('truckReport');
Route::get('/', 'TruckReportController@addreport')->name('add-report');
Route::get('/edit_report','TruckReportController@editReport')->name('editReport');
Route::get('/verify_report','TruckReportController@verifyReport')->name('veifyReport');