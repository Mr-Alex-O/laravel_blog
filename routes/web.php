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

App::bind('App\Billing\Stripe', function(){
    return new \App\Billing\Stripe(config('services.stripe.secret'));
});

$stripe = resolve('App\Billing\Stripe');

dd($stripe);



Route::get('/', 'PostsController@index')->name('home');

Route::get('/posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');
/*
 * GET    /posts              gets all posts
 * GET    /posts/create       goes to form to create post
 * POST   /posts              adds post to database
 * GET    /posts/{id}/edit    shows form to edit post
 * GET    /posts/{id}         shows single post
 * PATCH  /posts/{id}         edits the post
 * DELETE /posts/{id}         deletes the post
 */


Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');


Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');