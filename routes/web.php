<?php
// IMPORTANT
// 1. resource route names are [-]hiphen seperated
// 2. others route names ar camelcase

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('layouts.admin');
});

//........Pre registation like [public,corporate(c)]
Route::get('/pre-register','Auth\RegisterController@preRegister')->name('preRegister');
Route::get('/c-register','Auth\RegisterController@corporateRegister')->name('corporateRegister');
Route::post('/c-register','Auth\RegisterController@corporateCreate')->name('corporateCreate');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//.........ADMIN AREA..........
//.........admin login
Route::get('admin/login','Admin\User\AdminUsersController@login')->name('admin.login');

Route::group(['prefix'=>'admin'],function(){
    //..........admin dash
    Route::get('dash','Admin\Dash\AdminDashController@dash')->name('admin.dash');
    //..........user role
    Route::resource('user-role','Admin\UserRole\UserRolesController',['except'=>['create','show']]);
    //......system location
    Route::resource('sys-country','Admin\Location\SysCountriesController');
    Route::resource('sys-division','Admin\Location\SysDivisionsController');
    Route::resource('sys-city','Admin\Location\SysCitiesController');
    Route::resource('sys-police-station','Admin\Location\SysPoliceStationsController');
    Route::resource('sys-word','Admin\Location\SysWordsController');
    Route::resource('sys-village','Admin\Location\SysVillagesController');
    //........mobile bank
    Route::resource('mobile-bank','Admin\Bank\MobileBank\MobileBanksController',['except'=>['create','show']]);
    //........e-wallet
    Route::resource('e-wallet','Admin\Bank\EWallet\EWalletsController',['except'=>['create','show']]);
});

//........SYSTEM LOCATION............
Route::group(['middleware'=>'auth'],function()
{
    //.........get location for select option [ajax]
    Route::post('get-sys-division','PublicLocation\SysLocationController@getDivision')->name('getSysDivision');
    Route::post('get-sys-city','PublicLocation\SysLocationController@getCity')->name('getSysCity');
    Route::post('get-sys-police-station','PublicLocation\SysLocationController@getPoliceStation')->name('getSysPoliceStation');
    Route::post('get-sys-word','PublicLocation\SysLocationController@getWord')->name('getSysWord');
    Route::post('get-sys-village','PublicLocation\SysLocationController@getVillage')->name('getSysVillage');
});
