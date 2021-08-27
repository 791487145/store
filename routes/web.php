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

//菜单
Route::get('menus','MenuController@index');//菜单页
Route::get('menu/list','MenuController@menuLists');//菜单列表
Route::get('menus/create','MenuController@create');//添加页


Route::middleware('form.token')->group(function() {
    Route::post('menus','MenuController@store');//菜单存储
});

Route::get('create/formtoken','CommonController@formToken');//菜单页


