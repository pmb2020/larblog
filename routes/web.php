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

Route::namespace('Admin')->prefix('admin')->group(function (){
    Route::get('login','LoginController@login');
    Route::post('checkLogin','LoginController@checkLogin');
    Route::get('getChildCategory/{pid}','CategoryController@getChildCategory');

    Route::middleware(['age'])->group(function (){
        Route::get('/','IndexController@index');
        Route::get('/index','IndexController@index');
        Route::get('article/index','ArticleController@index');
        Route::get('loginOut','LoginController@loginOut');
        Route::post('article/coverUpload','ArticleController@coverUpload');
        Route::post('article/imagesUpload','ArticleController@imagesUpload');
        Route::any('article/create','ArticleController@create');
        Route::any('article/delete/{id}','ArticleController@delete');

        Route::get('category','CategoryController@index');
        Route::get('comment','CommentController@index');
        Route::get('config','ConfigController@index');
        Route::any('config/save','ConfigController@saveConfig');
    });
});


//博客前台路由
Route::namespace('Index')->group(function (){
    Route::get('/','IndexController@index');
    Route::get('ashare','IndexController@ashare');
    Route::get('ashare/{id}','IndexController@ashareType');
    Route::get('ajishu','IndexController@ajishu');
    Route::get('alife','IndexController@alife');
    Route::get('apinbo','IndexController@apinbo');
    Route::get('gbook','IndexController@gbook');
    Route::get('about','IndexController@about');
    Route::get('info/{id}','InfoController@index');
});

