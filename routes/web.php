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


Route::group(['domain' => 'admin.' . config('app.domain')], function () {

    Route::group(['middleware' => 'check_admin'], function () {
        Route::group(['namespace' => 'Admin'], function (){
            Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        });
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    });

    // Authentication Routes...
    Route::group(['namespace' => 'Auth'], function (){
        $this->get('login', 'LoginController@showLoginForm')->name('login');
        $this->post('login', 'LoginController@login')->name('postLogin');

        // Registration Routes...
        $this->get('register', 'RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'RegisterController@register');

        // Password Reset Routes...
        $this->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'ResetPasswordController@reset')->name('password.update');
    });

});



Route::group(['namespace' => 'User'], function (){
    Route::get('/', 'MainController@index')->name('web.home');
});

//Auth::routes();




Route::get('/home', 'HomeController@index')->name('home');
