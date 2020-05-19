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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/News','HomeController@getAddNews')->name('News');
Route::post('/News','HomeController@postAddNews')->name('News');
Route::get('/listnew','HomeController@getListNews')->name('listnew');


Route::get('/getDreft','HomeController@getDreft')->name('getDreft');
Route::get('/edit/{id}','HomeController@getEditNews')->name('edit/{id}');

Route::post('/edit/{id}','HomeController@postEditNews')->name('edit/{id}');
Route::post('/driver','HomeController@postAddNews')->name('driver');
Route::get('/listvideo','HomeController@listVideo')->name('listvideo');
Route::get('/video/{name}', 'HomeController@getVideo')->name('video/{name}');
Route::get('/add', 'HomeController@getAddVideo')->name('add');
Route::post('/add', 'HomeController@postAddVideo')->name('add');
 Route::get('/detail/{id}', 'HomeController@detailNews')->name('detail/{id}');
  Route::get('/detail/video/{name}', 'HomeController@getVideo')->name('detail/video/{name}');
Route::get('/checkvideo', 'HomeController@getCheckVideo')->name('checkvideo');
Route::post('/checkvideo', 'HomeController@postCheckVideo')->name('checkvideo');