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

Route::get('/index','IndexController@index');
Route::get('/welcome','IndexController@welcome');


Route::resource('users', 'UsersController');
Route::get('user/list','UsersController@userLists');

Route::resource('menus', 'MenuController');
Route::get('menu/list','MenuController@menuLists');

Route::resource('email', 'UsersController');
