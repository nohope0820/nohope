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

Route::get('/home', 'view\HomeController@index')->middleware('login')->name('home.index');

Route::group(["namespace"=>"view"], function () {
    Route::group(["namespace"=>"Profile"], function () {

        Route::get('/ho-so', 'ProfileController@index')->name('profile.index');

        Route::get('/sua-ho-so', 'ProfileController@edit')->name('profile.edit');

        Route::post('/sua-ho-so', 'ProfileController@update')->name('profile.update');
    });

    Route::group(["namespace"=>"Search"], function () {
        Route::group(["namespace"=>"User"], function () {

            Route::get('/tim-ban-be', 'IndexController@index')->name('find-user.index');

            Route::post('/tim-kiem', 'SearchController@main')->name('find-user.main');

            Route::get('/danh-sach-tim-kiem', 'SearchController@show')->name('find-user.show');
        });
    });

    Route::group(["namespace"=>"Room"], function () {

        Route::get('/tao-phong', 'StoreController@index');

        Route::post('/createRoom', 'StoreController@store')->name('room.store');

        Route::get('/room={id}', 'ChatController@index')->middleware('login');

        Route::get('/room', 'ListController@index')->middleware('login')->name('room.show');
    });

    Route::group(["namespace"=>"Friend"], function () {

        Route::get('/loi-moi-ket-ban', 'RequestController@index')->name('request-friend');

        Route::get('xac-nhan-yeu-cau/{id}', 'RequestController@accept');

        Route::get('huy-yeu-cau/{id}', 'RequestController@destroy');

        Route::get('/{id}-{slug_user}', 'DetailController@index')->name('detail-friend.index');

        Route::get('/{id}-{slug_user}/them-ban-be', 'DetailController@addFriend')->name('detail-friend.add');

        Route::get('/{id}-{slug_user}/huy-ket-ban', 'DetailController@unFriend')->name('detail-friend.un');
    });
});

