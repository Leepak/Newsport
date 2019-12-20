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
Route::group(['middleware'=>['web']],function(){



    Route::get('posts/blogs/{slug}',['as'=>'pages.url','uses'=>'UrlController@getUrl']);
    // ->where('slug','[w\d\-\_]+')
    Route::get('news',['uses' =>'UrlController@getIndex','as'=> 'News.index']);
    Route::get('/','PagesController@getIndex');
    Route::get('/about','PagesController@getAbout');

    Route::get('/contact','PagesController@getContact');
    Route::post('/contact','PagesController@postContact');
    
    Route::resource('blogs','BlogsController');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    
    Route::resource('hashtags','HashtagController',['except'=>['create']]);
});
Route::get('/help','PagesController@help');
Auth::routes();
    // Route::get('auth/login','Auth\AuthController@getLogin');
    // Route::post('auth/login','Auth\AuthController@postLogin');
    // Route::get('auth/logout','Auth\AuthController@getLogout');
    // Route::get('auth/register','Auth\AuthController@getRegister');
    // Route::post('auth/register','Auth\AuthController@postRegister');
// Route::get('/home', 'HomeController@index')->name('home');
