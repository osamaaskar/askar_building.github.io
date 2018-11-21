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

Route::pattern('id','[0-9]+');
Route::get('/', function () {
    return view('welcome');
});

Route::get('test','TestController@all_news');

Route::post('test1',function(){
  return "welcome to Test 1 Page";
});

//Route::group(['middleware'=>'news'],function(){
  Route::get('allnews','TestController@all_news')->middleware('news');
//});


Route::post('insert/news/','TestController@insert');
Route::delete('del/news/{id?}','TestController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('manual/login', 'UsersControler@login_get');
Route::post('manual/login', 'UsersControler@login_post');
Route::get('/test', 'HomeController@TestExcept');

Route::get('admin/path', function(){
  return view('welcome_admin');
})->middleware('Authadmin:webadmin');

Route::get('admin/login','AdminController@login');
Route::post('admin/login','AdminController@login_post');

Route::get('admin/logout',function(){
    auth()->guard('webadmin')->logout();
    return redirect('admin/login');
});


Route::get('directive',function(){
  return view('test_directive');
});
Route::post('upload/files','UploadController@upload');

Route::get('send/mail',function(){
  Mail::to('php@example.com')->send(new \App\Mail\TestMailable());
  return 'test Send Email';
});
