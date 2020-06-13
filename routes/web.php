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

Auth::routes();




Route::get('/home', 'PagesController@index')->name('home');
Route::get('/news', 'PagesController@news')->name('news');
Route::get('/tour', 'PagesController@tour')->name('tour');
Route::get('/media', 'PagesController@media')->name('media');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/profile/{user}', 'PagesController@profile')->name('profile');
Route::get('/news/{post}', 'PagesController@singlepost')->name('singlepost');


Route::middleware('role:Admin')->group(function(){

    Route::get('/admin','AdminsController@index')->name('admin');

    Route::get('/admin/posts','AdminsPostController@index')->name('admin.posts.index');
    Route::get('/admin/posts/create','AdminsPostController@create')->name('admin.posts.create');
    Route::post('/admin/posts','AdminsPostController@store')->name('admin.posts.store');
    Route::get('/admin/posts/{post}','AdminsPostController@show')->name('admin.posts.show');
    Route::get('/admin/posts/{post}/edit','AdminsPostController@edit')->name('admin.posts.edit');
    Route::put('/admin/posts/{post}/update','AdminsPostController@update')->name('admin.posts.update');
    Route::delete('/admin/posts/{post}/destroy','AdminsPostController@destroy')->name('admin.posts.destroy');

    Route::get('/admin/users','AdminsUserController@index')->name('admin.users.index');
    Route::get('/admin/users/create','AdminsUserController@create')->name('admin.users.create');
    Route::post('/admin/users','AdminsUserController@store')->name('admin.users.store');
    Route::get('/admin/users/{user}','AdminsUserController@show')->name('admin.users.show');
    Route::get('/admin/users/{user}/edit','AdminsUserController@edit')->name('admin.users.edit');
    Route::put('/admin/users/{user}/update','AdminsUserController@update')->name('admin.users.update');
    Route::delete('/admin/users/{user}/destroy','AdminsUserController@destroy')->name('admin.users.destroy');
    Route::put('/users/{user}/attach','AdminsUserController@attachRole')->name('admin.users.role.attach');
    Route::put('/users/{user}/detach','AdminsUserController@detachRole')->name('admin.users.role.detach');

    Route::get('/admin/concerts','AdminsConcertController@index')->name('admin.concerts.index');
    Route::get('/admin/concerts/create','AdminsConcertController@create')->name('admin.concerts.create');
    Route::post('/admin/concerts','AdminsConcertController@store')->name('admin.concerts.store');
    Route::get('/admin/concerts/{concert}','AdminsConcertController@show')->name('admin.concerts.show');
    Route::get('/admin/concerts/{concert}/edit','AdminsConcertController@edit')->name('admin.concerts.edit');
    Route::put('/admin/concerts/{concert}/update','AdminsConcertController@update')->name('admin.concerts.update');
    Route::delete('/admin/concerts/{concert}/destroy','AdminsConcertController@destroy')->name('admin.concerts.destroy');

    Route::get('/admin/media/{media}/edit','AdminsMediaController@edit')->name('admin.media.edit');
    Route::put('/admin/media/{media}/update','AdminsMediaController@update')->name('admin.media.update');

    Route::get('/admin/comments','AdminsPostCommentController@index')->name('admin.comments.index');
    Route::get('/admin/comments/create','AdminsPostCommentController@create')->name('admin.comments.create');
    Route::post('/admin/comments','AdminsPostCommentController@store')->name('admin.comments.store');
    Route::get('/admin/comments/{comment}','AdminsPostCommentController@show')->name('admin.comments.show');
    Route::get('/admin/comments/{comment}/edit','AdminsPostCommentController@edit')->name('admin.comments.edit');
    Route::put('/admin/comments/{comment}/update','AdminsPostCommentController@update')->name('admin.comments.update');
    Route::delete('/admin/comments/{comment}/destroy','AdminsPostCommentController@destroy')->name('admin.comments.destroy');

    Route::get('/admin/replies','AdminsCommentReplyController@index')->name('admin.replies.index');
    Route::get('/admin/replies/create','AdminsCommentReplyController@create')->name('admin.replies.create');
    Route::post('/admin/replies','AdminsCommentReplyController@store')->name('admin.replies.store');
    Route::get('/admin/replies/{comment_reply}','AdminsCommentReplyController@show')->name('admin.replies.show');
    Route::get('/admin/replies/{comment_reply}/edit','AdminsCommentReplyController@edit')->name('admin.replies.edit');
    Route::put('/admin/replies/{comment_reply}/update','AdminsCommentReplyController@update')->name('admin.replies.update');
    Route::delete('/admin/replies/{comment_reply}/destroy','AdminsCommentReplyController@destroy')->name('admin.replies.destroy');

    Route::get('/admin/roles','AdminsRoleController@index')->name('admin.roles.index');
    Route::get('/admin/roles/create','AdminsRoleController@create')->name('admin.roles.create');
    Route::post('/admin/roles','AdminsRoleController@store')->name('admin.roles.store');
    Route::get('/admin/roles/{role}','AdminsRoleController@show')->name('admin.roles.show');
    Route::get('/admin/roles/{role}/edit','AdminsRoleController@edit')->name('admin.roles.edit');
    Route::put('/admin/roles/{role}/update','AdminsRoleController@update')->name('admin.roles.update');
    Route::delete('/admin/roles/{role}/destroy','AdminsRoleController@destroy')->name('admin.roles.destroy');

    Route::get('/admin/permissions','AdminsPermissionController@index')->name('admin.permissions.index');
    Route::get('/admin/permissions/create','AdminsPermissionController@create')->name('admin.permissions.create');
    Route::post('/admin/permissions','AdminsPermissionController@store')->name('admin.permissions.store');
    Route::get('/admin/permissions/{permission}','AdminsPermissionController@show')->name('admin.permissions.show');
    Route::get('/admin/permissions/{permission}/edit','AdminsPermissionController@edit')->name('admin.permissions.edit');
    Route::put('/admin/permissions/{permission}/update','AdminsPermissionController@update')->name('admin.permissions.update');
    Route::delete('/admin/permissions/{permission}/destroy','AdminsPermissionController@destroy')->name('admin.permissions.destroy');
});

Route::middleware('auth')->group(function(){

    Route::get('/comments','CommentController@index')->name('comments.index');
    Route::get('/comments/create','CommentController@create')->name('comments.create');
    Route::post('/comments','CommentController@store')->name('comments.store');
    Route::get('/comments/{comment}','CommentController@show')->name('comments.show');
    Route::get('/comments/{comment}/edit','CommentController@edit')->name('comments.edit');
    Route::put('/comments/{comment}/update','CommentController@update')->name('comments.update');
    Route::delete('/comments/{comment}/destroy','CommentController@destroy')->name('comments.destroy');

    Route::get('/replies','CommentReplyController@index')->name('replies.index');
    Route::get('/replies/create','CommentReplyController@create')->name('replies.create');
    Route::post('/replies','CommentReplyController@store')->name('replies.store');
    Route::get('/replies/{comment_reply}','CommentReplyController@show')->name('replies.show');
    Route::get('/replies/{comment_reply}/edit','CommentReplyController@edit')->name('replies.edit');
    Route::put('/replies/{comment_reply}/update','CommentReplyController@update')->name('replies.update');
    Route::delete('/replies/{comment_reply}/destroy','CommentReplyController@destroy')->name('replies.destroy');

    Route::put('/users/{user}/update','UserController@update')->name('users.update');
});
