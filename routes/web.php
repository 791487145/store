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

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login','LoginController@login');
    Route::post('/login','LoginController@postLogin');
});
Route::get('/index','IndexController@index');
Route::get('/welcome','IndexController@welcome');


Route::get('users', 'UsersController@index');
Route::get('user/list','UsersController@userLists');
Route::get('user/{id}/role','UsersController@role');
Route::post('user/role','UsersController@roleChange');

//角色
Route::get('role','RoleController@index');//角色页
Route::get('role/list','RoleController@roleLists');//角色列表
Route::get('role/create','RoleController@create');//添加页
Route::get('role/{id}/show','RoleController@show');//修改页
Route::post('role/status','RoleController@status');//角色状态修改
Route::post('role/delete','RoleController@delete');//角色删除
Route::get('role/{id}/permission','RoleController@permission');//角色权限
Route::get('role/{id}/permission/tree','RoleController@permissionTree');//角色权限数据树
Route::post('role/permission','RoleController@permissionChange');//角色权限

//权限
Route::get('permission','PermissionController@index');//菜单页
Route::get('permission/list','PermissionController@permissionLists');//菜单列表
Route::get('permission/create','PermissionController@create');//添加页
Route::get('permission/{id}/show','PermissionController@show');//修改页
Route::post('permission/{id}/delete','PermissionController@delete');//菜单删除
Route::get('permission/user/list','PermissionController@permissionUserList');//用户菜单列表


Route::middleware('form.token')->group(function() {
    Route::post('permission','PermissionController@store');//菜单存储
    Route::post('permission/update','PermissionController@update');//菜单修改

    Route::post('role','RoleController@store');//角色存储
    Route::post('role/update','RoleController@update');//角色修改

});



Route::get('create/formtoken','CommonController@formToken');//菜单页


