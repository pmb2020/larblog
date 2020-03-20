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
    return view('welcome',['name'=>'迷鹿先生']);
});

Route::any('/test',function (){
    return '这是一个测试路由';
});

Route::get('admin/profile', function () {
    return '中间件测试';
})->middleware('age');

Route::get('/test1','IndexController@test');
Route::get('/dbtest','IndexController@dbtest');

Route::get('/model/test','IndexController@modeltest');

//下面为博客所用路由
Route::get('/admin/login','admin\LoginController@login');
Route::get('/admin/loginOut','admin\LoginController@loginOut');
Route::get('/admin/getChildCategory/{pid}','admin\CategoryController@getChildCategory');
Route::prefix('admin')->middleware(['age'])->group(function (){
    Route::get('/index','admin\IndexController@index');
    Route::get('/article/index','admin\ArticleController@index');
    Route::post('/article/coverUpload','admin\ArticleController@coverUpload');
    Route::post('/article/imagesUpload','admin\ArticleController@imagesUpload');
});

Route::post('/admin/checkLogin','admin\LoginController@checkLogin');
Route::any('/admin/article/create','admin\ArticleController@create');
Route::any('/admin/article/test','admin\ArticleController@test');
Route::any('/admin/article/delete/{id}','admin\ArticleController@delete');

//博客前台路由
Route::get('/','index\IndexController@index');
Route::get('/ashare','index\IndexController@ashare');
Route::get('/ashare/{id}','index\IndexController@ashareType');
Route::get('/ajishu','index\IndexController@ajishu');
Route::get('/alife','index\IndexController@alife');
Route::get('/apinbo','index\IndexController@apinbo');
Route::get('/gbook','index\IndexController@gbook');
Route::get('/about','index\IndexController@about');
Route::get('/info/{id}','index\InfoController@index');
