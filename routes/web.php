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

/*Route::get('/', function () {
    return view('upload.uploads');
});
Route::post('/upload_file', function (){
    request()->file('profile_picture')->store('profile_pic');
    return back();
});*/
Auth::routes();

Route::get('contact', 'PagesController@getContact');
/*Route::post('contact', 'PagesController@postContact');*/
Route::get('about', 'PagesController@getAbout');
Route::get('/home', 'PagesController@getIndex');
Route::get('blog/{slug}', ['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('blog', ['as'=>'blog.index','uses'=>'BlogController@getIndex']);
Route::resource('posts','PostController');
Route::resource('categories','CategoryController',['except'=>['create']]);
Route::resource('tags','TagController',['except'=>['create']]);
//Route::resource('comments','CommentController');

//Comment
Route::post('comments/{post_id}', ['as'=>'comments.store','uses'=>'CommentController@store']);
Route::get('comments/{id}/edit', ['as'=>'comments.edit','uses'=>'CommentController@edit']);
Route::get('comments/{id}/delete', ['as'=>'comments.delete','uses'=>'CommentController@delete']);
Route::put('comments/{id}', ['as'=>'comments.update','uses'=>'CommentController@update']);
Route::delete('comments/{id}', ['as'=>'comments.destroy','uses'=>'CommentController@destroy']);

