# Laravel Notes:

**Type phpartisan to see all commands!**

## Things to do more research on:
- Namepsacing
- Dependancy Injection

## Composer:
Download & Install Composer from site
To access composer in terminal type
```
nano .bash_profile
```
This is the file where bash_profiles are stored such as aliases and more.
Add export 
```
PATH="~/.composer/vendor/bin:$PATH”
```
You **have to refresh the bash profile** when you've finished with it like so:
```
source .bash_profile
```



## Routes:
Named routes allow you to add nicknames to them so you can reference them in your views. Like so:
```
<a href=“route(‘admin.home)”>Test</a>
```
We name them like this:
```
Route::get('admin/posts/example2', function(){

    $url = route('admin.home2');

    return "this url is ". $url;

})->name('admin.home2’);
```
### Handy Shortcuts:

```
php artisan make:controller ControllerName
```




## Controllers:
***Naming convention:*** Should be singular case and no spacing between words and end with controller.
```
PostsController
```

## Views:
***Naming convention:*** Should be all in lower case and use snake case (underscore between words):

To pass parameters to views we can either use the with function like this:

```
return view('postsingle')->with('id', $id);
```

Or we can do the compact function, which converts it to a variable, a lot cleaner:

```
return view('postsingle', compact('id'));
```




## Migrations: 
***Naming convention:*** Should be all lowercase and separate each word by a underscore.
```
create_posts_table
```
The —create means we want to make a table named posts, which makes it easier when jumping into the class.
```
php artisan make:migration create_posts_table --create="posts"
```
Php artisan migrate:rollback deletes the last migration that you did,
To add a column to a table that already exists, 
```
php artisan make:migration add_is_admin_column_to_posts_table —-table=posts
```
Default ->default() is the default number or string if its not entered 
See laravel columns docs for more details.

```
php artisan migrate:reset
``` 
Will get rid of all tables
```
php artisan migrate:fresh
``` 
Will drop all tables then create tables again
```
php artisan migrate:status
``` 
Will tell you if migrations ran successfully.


## Raw SQL Queries:

## Create (INSERT):
```
Route::get('/insert', function(){

    DB::insert('insert into posts(title, body, is_admin) value(?, ?, ?)', ['PHP with laravel', 'This is the content field', '1']);

});
```

Route::get('/read', function(){
```
Route::get('/read', function(){

    //This will return an array of results
    $results = DB::select('select * from posts where id = ?', [1]);

    foreach($results as $result) {

        //return $result;

    }

    return $results;

});
```

### Update (UPDATE):
```
Route::get('/update', function(){

    $updated = DB::update('update posts set title = "Updated title" where id = ?', [1]);

    return $updated;

});
```

## Delete (DELETE):
```
Route::get('/delete', function(){

    $deleted = DB::delete('delete from posts where id = ?', [1]);

    return $deleted;

});
```

## Models:
***Naming convention:*** Singular with no spacing between words and captialised. 
```
posts.blade.php post_single.blade.php
```










