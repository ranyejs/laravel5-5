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

//前台路由组
Route::group(['namespace' => 'Home'], function(){
    // 控制器在 "App\Http\Controllers\Home" 命名空间下

});

//后台登录路由
Route::group(['namespace' => 'Admin'],function(){
    //后台登录生成验证码
    Route::get('/createimg','LoginController@createImg');
   //测试加密
    Route::get('/encrypt','LoginController@encrypt');
   //后台登录
    Route::get('/admin/login', 'LoginController@index');
    Route::post('/admin/dologin', 'LoginController@doLogin');
});


//后台已经登录路由组
Route::group(['prefix'=>'admin','namespace' => 'Admin','middleware'=>'isLogin'], function(){
    // 控制器在 "App\Http\Controllers\Admin" 命名空间下

    Route::get('index', 'AdminController@index');
    Route::get('welcome', 'AdminController@welcome');
    Route::get('logout', 'AdminController@logout');

    //后台用户模块相关
    Route::resource('user','UserController');

    //角色
    Route::resource('role','RoleController');

    //权限
    Route::resource('promission','PromissionController');
});

