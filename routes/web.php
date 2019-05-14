<?php

Use App\Post;

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

Route::get('/post/{id}/{name}', function($id, $name){

    return 'This is post number '. $id . 'and name is'. $name;

});

Route::get('admin/posts/example', function(){

    $url = route('admin.home');

    return "this url is ". $url;

})->name('admin.home');

Route::get('/post', 'PostsController@index');
Route::get('/post/{id}', 'PostsController@postSingle');

Route::get('/contact', 'PostsController@contact');


/**
 *
 *
 * RAW SQL Queries
 *
 */

Route::get('/insert', function(){

    DB::insert('insert into posts(title, body, is_admin) value(?, ?, ?)', ['PHP with laravel number 2', 'This is the content field', '1']);

});
//
//Route::get('/read', function(){
//
//    //This will return an array of results
//    $results = DB::select('select * from posts where id = ?', [1]);
//
//    foreach($results as $result) {
//
//        //return $result;
//
//    }
//
//    return $results;
//
//});
//
//Route::get('/update', function(){
//
//    $updated = DB::update('update posts set title = "Updated title" where id = ?', [1]);
//
//    return $updated;
//
//});
//
//Route::get('/delete', function(){
//
//    $deleted = DB::delete('delete from posts where id = ?', [1]);
//
//    return $deleted;
//
//});

/**
 *
 *
 * Simple Modelling
 *
 */

Route::get('/read', function() {

    $post = Post::find(2);

    return $post->title;

});

Route::get('/findwhere', function(){


    $posts = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();

    return $posts;

});

Route::get('/findmore', function(){

    //$posts = Post::where('users_count', '<', 50)->firstOrFail();

    $posts = Post::find('3')->firstOrFail();

    return $posts;

});

Route::get('/basicinsert', function(){

    $post = new Post;

    $post->title = 'New Title';
    $post->body = 'More content';
    
    $post->save(); //Save or update, save will insert the record and also update.
    
});

Route::get('/basicinsert2', function(){

    $post = Post::find(1);

    $post->title = 'New New Title';
    $post->body = 'More More content';

    $post->save(); //Save or update, save will insert the record and also update.

});

Route::get('/create', function(){

    //Here we will get the mass assignment exception
    Post::create(['title'=>'create create', 'body'=>'learning stuff']);

});

Route::get('/update', function(){

    Post::where('id', 2)->update(['title'=>'NEW TITLE', 'body'=>'some more updated content']);

});

Route::get('/delete', function(){

    $post = Post::find(1);

    $post->delete();

    //Or this:
    //Post::destroy([4,5]);
    //Post::where('is_admin', 0)-delete();

});

Route::get('/softdelete', function(){

    Post::find(2)->delete();

});

Route::get('/readsoftdelete', function(){

//    $post = Post::find(2);
//
//    return $post;

//    $post = Post::withTrashed()->where('id', 2)->get();
//
//    return $post;

    $post = Post::onlyTrashed()->get();

    return $post;

});

Route::get('/restore', function(){

    //This makes the deleted_at column null again so its not soft deleted.
    Post::withTrashed()->restore();

});

Route::get('/forcedelete', function(){

    Post::withTrashed()->where('id', 2)->forceDelete();

});