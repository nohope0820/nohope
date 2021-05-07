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

Route::get('/home', 'view\HomeController@homeView')->middleware('login')->name('home');

Route::get('/detail-friend/{id}', 'view\HomeController@detailfriend');

Route::get('/profile', 'view\HomeController@profile')->name('profile');

Route::get('/sua-ho-so', 'view\HomeController@repairprofile')->name('repairprofile');

Route::post('/sua-ho-so', 'view\HomeController@updateprofilePost')->name('updateprofile');

Route::get('/tao-phong', 'view\RoomController@createRoom')->name('createRoom');

Route::post('/createRoom', 'view\RoomController@createRoomPost')->name('createRoomPost');

Route::get('/search', 'view\FindUserController@findfriend')->name('findfriend');

Route::get('/result-find-friend', 'view\FindUserController@resultfindfriend')->name('resultfindfriend');

Route::get('/room={id}', 'view\RoomController@chatroom')->middleware('login')->name('chatRoom');

Route::get('/room', 'view\RoomController@listRoom')->middleware('login')->name('listroom');

Route::post('/search', 'view\FindUserController@searchFriendFullText')->name('searchfriend');

Route::get('/addfriend/{id}', 'view\AddController@addfriend')->name('addfriend');

Route::get('/unfriend/{id}', 'view\AddController@unfriend')->name('unfriend');

Route::get('/loi-moi-ket-ban', 'view\AddController@friendRequest')->name('friendRequest');

Route::get('/accept/{id}', 'view\AddController@acceptFriend')->name('acceptFriend');

Route::get('/deleteFriendRequest/{id}', 'view\AddController@deleteFriendRequest')->name('deleteFriendRequest');

Route::get('/them-thanh-vien/{id}', 'view\HomeController@addMemberForRoom')->name('addMemberForRoom');

Route::get('/them-thanh-vien/{key}', 'view\HomeController@addMemberSearch');

Route::get('/message/{id}', 'view\MessagePersonalController@message')->name('message');

Route::post('/messagePost/{id}', 'view\MessagePersonalController@messagePost');

Route::post('/messagePost/{id}', 'view\MessageRoomController@messagePost');
