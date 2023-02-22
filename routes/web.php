<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PlayListController;
use App\Http\Controllers\SessionController;

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

Route::get('/login', [CustomAuthController::class, 'login'])->middleware('AlreadyLoggedIn');
Route::get('/registration', [CustomAuthController::class, 'registration'])->middleware('AlreadyLoggedIn');
Route::post('/register-user',[CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/genres/{id}', 'App\Http\Controllers\SongController@index');
Route::get('/playlists', 'App\Http\Controllers\PlayListController@index');
Route::get('delete-Playlist/{id}', 'App\Http\Controllers\SessionController@deletePlaylist');

Route::post('add-playlist', [PlayListController::class, 'addPlaylist'])->name('add-playlist');   
Route::post('add-Song', [SessionController::class, 'addSongTime'])->name('add-Song');  
Route::post('/add-playlist', 'App\Http\Controllers\PlayListController@addPlaylist');
Route::get('/playlist/{id}', 'App\Http\Controllers\PlayListController@selectedPlaylist');
Route::get('delete-Playlist-song/{id}/{list}', 'App\Http\Controllers\PlaylistController@deletePlaylistSong');
Route::get('delete-list/{id}', 'App\Http\Controllers\PlayListController@deleteList');
Route::post('update-name/{id}', 'App\Http\Controllers\PlayListController@updateName');
Route::post('add-toplaylist', 'App\Http\Controllers\PlayListController@addtoPlaylist');
Route::get('/berekenen/{id}', 'App\Http\Controllers\PlayListController@berekenen');

Route::get('logout', [CustomAuthController::class, 'logout']);