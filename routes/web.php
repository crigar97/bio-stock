<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/profile', 'UserController@profile')->name('user.profile')->middleware('auth');

Route::resource('/users', 'UserController');

Route::resource('/specimens', 'SpecimenController');
Route::get('/import', 'SpecimenController@import')->name('specimens.import')->middleware('auth');
Route::post('/import', 'SpecimenController@massStore')->name('specimens.mass-store')->middleware('auth');
Route::get('/export/{ids}', 'SpecimenController@export')->name('specimens.export')->middleware('auth');
Route::get('/export/download/{ids}', 'SpecimenController@massShow')->name('specimens.mass-show')->middleware('auth');
Route::get('/search', 'SpecimenController@search')->name('specimens.search')->middleware('auth');
Route::get('/find', 'SpecimenController@find')->name('specimens.find')->middleware('auth');



