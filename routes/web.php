<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'view\HomeController@index')->name('home');

Route::get('/find-friend', 'view\HomeController@findfriend')->name('findfriend');

Route::get('/result-find-friend', 'view\HomeController@resultfindfriend')->name('resultfindfriend');

Route::get('/detail-friend/{id}', 'view\HomeController@detailfriend');

Route::get('/profile', 'view\HomeController@profile')->name('profile');

Route::get('/sua-ho-so', 'view\HomeController@repairprofile')->name('repairprofile');

Route::post('/sua-ho-so', 'view\HomeController@updateprofilePost')->name('updateprofile');