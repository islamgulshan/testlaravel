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
  return view('layouts/app');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// admin 

Route::get('/admin', function (){
	return view('admin.index');
});


Route::get('/post/{id}', ['as'=>'home.post','uses'=>'AdminPostController@post']); 


Route::group(['middleware'=>'admin'], function (){
	Route::resource('/admin/user', 'AdminUsersController');
	Route::resource('/admin/posts', 'AdminPostController');	
	Route::resource('/admin/media', 'MediaController');
	Route::resource('/admin/comments', 'CommentsController');
	Route::resource('/admin/Comment/reply', 'CommentsReplyController'); 
	Route::resource('/admin/Categoires', 'CategoiresController');
});

Route::group(['middleware'=>'auth'], function (){
	Route::post('comment/replycomments','CommentsReplyController@createReply'); 
});



	