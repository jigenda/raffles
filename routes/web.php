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
    return view('welcome');
});

// Admin
Route::group(['as' => 'admin.', 'middleware' => 'auth.admin', 'namespace' => 'Admin', 'prefix' => 'admin'], function (){

    // Dashboard
	// Route::get('logout', 'DashboardController@logout')->name('logout');

    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    

});

// Organisation
Route::group(['as' => 'organisation.', 'middleware' => 'auth.admin', 'namespace' => 'Organisation', 'prefix' => 'organisation'], function (){

    // Dashboard
	// Route::get('logout', 'DashboardController@logout')->name('logout');

    Route::get('/dashboard', 'OrganisationController@dashboard')->name('dashboard');

});

// Seller
Route::group(['as' => 'seller.', 'middleware' => 'auth.admin', 'namespace' => 'Seller', 'prefix' => 'seller'], function (){

    // Dashboard
	// Route::get('logout', 'DashboardController@logout')->name('logout');

    Route::get('/dashboard', 'SellerController@dashboard')->name('dashboard');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'Auth\LoginController@showLoginForm')->name('admin');
Route::get('/getRaffles', 'RaffleController@getRaffles')->name('getRaffles');
Route::post('/createRaffle', 'RaffleController@createRaffle')->name('createRaffle');
Route::get('/getSellers', 'Seller\SellerController@getSellers')->name('getSellers');