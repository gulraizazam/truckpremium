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
Route::get('/login','TruckReportController@login')->name('showlogin');
Route::post('actLogin','TruckReportController@actLogin')->name('actLogin');
Route::group(['middleware' => 'supervisor'], function () {
	Route::get('/', 'TruckReportController@addreport')->name('add-report');
	Route::post('/genrate-report', 'TruckReportController@RecievedReport')->name('truckReport');
	Route::get('/edit_report','TruckReportController@editReport')->name('editReport');
	Route::get('/verify_report','TruckReportController@verifyReport')->name('veifyReport');
	
	Route::post('actEditReport','TruckReportController@actEditReport')->name('actEditReport');
	Route::get('/rediectReport', 'TruckReportController@rediectReport')->name('rediectReport');

	Route::get('/logout','TruckReportController@logout')->name('logout');
	Route::get('/error','TruckReportController@ErrorPage')->name('error');
});
//Admin Routes
//Premium

Route::group(['middleware' => 'admin'], function () {
	
	Route::get('/admin', 'AdminPagesController@index')->name('admin');
	Route::get('/addpremium', 'AdminPagesController@AddPremium')->name('addpremium');
	Route::get('/allpremiums', 'AdminPagesController@AllPremium')->name('allpremiums');
	Route::post('/submitpremium', 'AdminPagesController@InsertPremium')->name('submitPremium');
	Route::get('editpremium/{id}', 'AdminPagesController@EditPremium')->name('editpremium');
	Route::post('/updatepremium/{id}', 'AdminPagesController@UpdatePremium')->name('updatepremium');
	Route::get('/deletepremium/{id}', 'AdminPagesController@DeletePremium')->name('deletepremium');
	//Territory
	Route::get('/addterritory', 'AdminPagesController@AddTerritory')->name('addterritory');
	Route::get('/allterritories', 'AdminPagesController@AllTerritories')->name('allterritories');
	Route::post('/submitTerritory', 'AdminPagesController@InsertTerritory')->name('submitTerritory');
	Route::get('/editterritory/{id}', 'AdminPagesController@EditTerritory')->name('editterritory');
	Route::get('/deleteterritory/{id}', 'AdminPagesController@DeleteTerritory')->name('deleteterritory');
	Route::post('/updateTerritory/{id}', 'AdminPagesController@UpdateTerritory')->name('updateTerritory');
	//Class Factors
	Route::get('/addclassfactor', 'AdminPagesController@AddClassFactor')->name('addclassfactor');
	Route::get('/allclassfactors', 'AdminPagesController@AllClassFactors')->name('allclassfactors');
	Route::post('/submitfactor', 'AdminPagesController@InsertFactor')->name('submitFactor');
	Route::get('/editclassfactor/{id}', 'AdminPagesController@EditFactor')->name('editclassfactor');
	Route::get('/deleteclassfactors/{id}', 'AdminPagesController@DeleteFactor')->name('deleteclassfactors');
	Route::post('/updateclassfactors/{id}', 'AdminPagesController@UpdateFactor')->name('updateclassfactors');
	//Car Rate Groups
	Route::get('/addcarrategroups', 'AdminPagesController@AddCarRate')->name('addcarrategroups');
	Route::get('/allcarrategroups', 'AdminPagesController@AllCarRateGroups')->name('allcarrategroups');
	Route::post('/submitcarRate', 'AdminPagesController@InsertCarRate')->name('submitcarRate');
	Route::get('/editcarrate/{id}', 'AdminPagesController@EditCarRate')->name('editcarrate');
	Route::get('/deletecarrate/{id}', 'AdminPagesController@DeleteCarRate')->name('deletecarrate');
	Route::post('/updatecarrate/{id}', 'AdminPagesController@UpdateCarRate')->name('updatecarrate');
	//Group Factors
	Route::get('/addgroupfactors', 'AdminPagesController@AddGroupFactor')->name('addgroupfactors');
	Route::get('/addnewgroupfactors', 'AdminPagesController@AddGroupFactor')->name('addnewgroupfactors');
	Route::post('/submitGroupFactor', 'AdminPagesController@InsertGroupFactor')->name('submitGroupFactor');
	Route::get('/allgroupfactors', 'AdminPagesController@AllGroupFactors')->name('allgroupfactors');

	Route::get('/editgroupfactor/{id}', 'AdminPagesController@EditGroupFactor')->name('editgroupfactor');
	Route::get('/deletegroupfactors/{id}', 'AdminPagesController@DeleteGroupFactor')->name('deletegroupfactors');
	Route::post('/updateGroupFactor/{id}', 'AdminPagesController@UpdateGroupFactor')->name('updateGroupFactor');

	//collisions
	Route::get('/addcollision', 'AdminPagesController@AddCollision')->name('addcollision');
	Route::post('/submitCollision', 'AdminPagesController@InsertCollision')->name('submitCollision');
	Route::get('/allcollisions', 'AdminPagesController@AllCollisions')->name('allcollisions');
	Route::get('/editcollision/{id}', 'AdminPagesController@EditCollision')->name('editcollision');
	Route::post('/updateCollision/{id}', 'AdminPagesController@UpdateCollision')->name('updateCollision');
	Route::get('/deletecollision/{id}', 'AdminPagesController@DeleteCollision')->name('deletecollision');

	//Comprehensives
	Route::get('/addcomprehensive', 'AdminPagesController@AddComprehensive')->name('addcomprehensive');
	Route::post('/submitComprehensive', 'AdminPagesController@InsertComprehensive')->name('submitComprehensive');
	Route::get('/allcomprehensives', 'AdminPagesController@Allcomprehensives')->name('allcomprehensivess');
	Route::get('/editcompre/{id}', 'AdminPagesController@EditComprehensive')->name('editcompre');
	Route::post('/updateCompre/{id}', 'AdminPagesController@updateComprehensive')->name('updateCompre');
	Route::get('/deletecompre/{id}', 'AdminPagesController@DeleteComprehensive')->name('deletecompre');

	//Liability
	Route::get('/addliability', 'AdminPagesController@AddLiability')->name('addliability');
	Route::post('/submitLiability', 'AdminPagesController@InsertLiability')->name('submitLiability');
	Route::get('/allliabilities', 'AdminPagesController@AllLiability')->name('allliabilities');
	Route::get('/editliability/{id}', 'AdminPagesController@EditLiability')->name('editliability');
	Route::post('/updateLiability/{id}', 'AdminPagesController@UpdateLiability')->name('updateLiability');
	Route::get('/deleteliability/{id}', 'AdminPagesController@DeleteLiability')->name('deleteliability');
});