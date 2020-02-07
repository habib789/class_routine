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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
Route::get('/', 'authController@index')->name('login');
Route::post('/', 'authController@LoginProcess')->name('login');
Route::get('/register', 'authController@regShow')->name('register');
Route::post('/register', 'authController@storeUser')->name('register');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'authController@logout')->name('logout');
    Route::get('/change-password', 'changePassController@changePass')->name('passChange');
    Route::put('/change-password', 'changePassController@changePassProcess')->name('pass.Change');

    Route::get('/dashboard', 'homeController@dashboard')->name('dashboard');
//    Route::get('/dashboard/routine-view', 'homeController@routine')->name('view.routine');
    Route::get('/profile', 'homeController@profile')->name('profile');
    Route::get('/My_profile_info', 'homeController@profile_info')->name('profileUpdate');
    Route::put('/My_profile_info/up', 'homeController@profile_info_update')->name('inUpdate');
    Route::get('/My_profile_info/img', 'homeController@ppShow')->name('ppShow');
    Route::put('/My_profile_info/img', 'homeController@uploadPhoto');


//Admin
    Route::group(['middleware' => 'admin'], function () {
        Route::resource('/dashboard/admin/subjects', 'subjectController');
        Route::resource('/dashboard/admin/times', 'timesController');
        Route::resource('/dashboard/admin/routines', 'routinesController');
    });
});
