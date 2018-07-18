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
    //..........user
    Route::resource('users','Admin\User\AdminUsersController',['except'=>'show']);
    Route::post('user/create','Admin\User\AdminUsersController@corporateStore')->name('user.corporate.store');
    Route::get('user-by-role/{role}','Admin\User\AdminUsersController@userByRole')->name('userByRole');

    Route::put('users/password/{id}','Admin\User\AdminUsersController@changePassword')->name('user.changePassword');
    Route::get('users/verify/{token}','Admin\User\AdminUsersController@verifyByAdmin')->name('user.verifyByAdmin');
    Route::get('users/admin/{id}','Admin\User\AdminUsersController@makeAdmin')->name('user.makeAdmin');
    Route::get('users/regular/{id}','Admin\User\AdminUsersController@makeRegular')->name('user.makeRegular');
    Route::get('users/active/{id}','Admin\User\AdminUsersController@active')->name('user.active');
    Route::get('users/deactive/{id}','Admin\User\AdminUsersController@deactive')->name('user.deactive');

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
    
    // ........... product
    Route::group(['prefix'=>'product'], function(){
        //........type
        Route::resource('type','Admin\ProductAccessories\Type\TypesController',['except'=>['create','show']]);
        //........category
        Route::resource('category','Admin\ProductAccessories\Category\CategoriesController',['except'=>['show']]);
        //........sub category
        Route::resource('sub-category','Admin\ProductAccessories\SubCategory\SubCategoriesController',['except'=>['show']]);
        //........size
        Route::resource('size','Admin\ProductAccessories\Size\SizesController',['except'=>['create','show']]);
        //........color
        Route::resource('color','Admin\ProductAccessories\Color\ColorsController',['except'=>['create','show']]);
        //........Brand
        Route::resource('brand','Admin\ProductAccessories\Brand\BrandsController',['except'=>['show']]);

        //.........get category for select option [ajax]
        Route::post('get-category','Admin\ProductAccessories\Category\CategoriesController@getCategory')->name('getCategory');
    });
});

//........SYSTEM LOCATION............
Route::group(['middleware'=>'auth'],function(){
    //.........get location for select option [ajax]
    Route::post('get-sys-division','PublicLocation\SysLocationController@getDivision')->name('getSysDivision');
    Route::post('get-sys-city','PublicLocation\SysLocationController@getCity')->name('getSysCity');
    Route::post('get-sys-police-station','PublicLocation\SysLocationController@getPoliceStation')->name('getSysPoliceStation');
    Route::post('get-sys-word','PublicLocation\SysLocationController@getWord')->name('getSysWord');
    Route::post('get-sys-village','PublicLocation\SysLocationController@getVillage')->name('getSysVillage');
});
