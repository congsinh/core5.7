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

Route::group([ 'middleware' => ['web']], function () {
    Route::group([ 'namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {

        $this->get('login', 'AuthController@showLoginForm')->name('login');
        $this->post('login', 'AuthController@login')->name('postLogin');

        Route::group(['middleware' => 'check_admin'], function () {
            Route::get('logout', 'AuthController@logout')->name('logout');

            Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        });


    });



//    Route::group(['namespace' => 'User'], function (){
//        Route::get('/', 'MainController@index')->name('web.home');
//    });
//
//
//
//
//
//    Route::get('/home', 'HomeController@index')->name('home');
});

