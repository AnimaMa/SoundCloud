<?php
use App\Album;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

Route::get('/', 'WelcomeController@index');

Route::get('albums', 'AlbumsController@index');
Route::get('albums/{albumId}/delete', 'AlbumsController@destroy');
Route::get('albums/add', 'AlbumsController@add');
Route::post('albums/add', 'AlbumsController@store');
Route::get('albums/{id}', 'AlbumsController@show');
Route::get('albums/{albumId}/edit', 'AlbumsController@edit');
Route::put('albums/edit', 'AlbumsController@update');


Route::get('authors', 'AuthorsController@index');
Route::get('authors/{authorId}/delete', 'AuthorsController@destroy');
Route::get('authors/add', 'AuthorsController@add');
Route::get('authors/{authorId}', 'AuthorsController@show');
Route::post('authors/add', 'AuthorsController@store');

Route::get('authors/{authorId}/edit', 'AuthorsController@edit');
Route::put('authors/edit', 'AuthorsController@update');


Route::get('songs', 'SongsController@show');

Route::get('songs/add', 'SongsController@add');
Route::post('songs/add', 'SongsController@store');
//Route::get('songs/{id}', 'SongsController@show');
