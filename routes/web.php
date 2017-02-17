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



Route::resource('/article', 'ArticleController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/user', ['as' => 'users.index', 'uses' => 'UserController@index']);

Route::put('user/comments/update/{id}', ['as' => 'users.update', 'uses' => 'UserController@update']);

Route::post('/article/{id}/comment/create', ['as' => 'comment.create', 'uses' => 'CommentController@create']);

Route::get('comment/like/{id}', ['as' => 'comment.like', 'uses' => 'LikeController@likeComment']);
Route::get('article/like/{id}', ['as' => 'article.like', 'uses' => 'LikeController@likeArticle']);


Route::group(['middleware' => 'admin'], function () {
   Route::get('admin/comments', ['as' => 'comments.admin', 'uses' => 'CommentController@admin']);
   Route::put('admin/comments/update/{id}', ['as' => 'comments.update', 'uses' => 'CommentController@update']);
   Route::delete('admin/comments/delete/{id}', ['as' => 'comments.delete', 'uses' => 'CommentController@delete']);
});

Route::post('/like', 'LikeController@like');
Route::post('/unlike', 'LikeController@unlike');

//EXO1

/*Route::get('/iim', function() {
   return view('exo1.iim');
});


Route::get('/bonjour/{name}', function($name) {
    return view('exo1.bonjour', ['prenom' => $name]);
});

Route::get('/test', function() {
    $age = 15;

    $tasks = [
        'Faire le ménage',
        'Envoyer un mail'
    ];

    return view('exo1.test', compact('age', 'tasks'));
});

Route::get('/page1', function() {
    return view('exo1.page1');
});

Route::get('/page2', function() {
    return view('exo1.page2');
});*/
