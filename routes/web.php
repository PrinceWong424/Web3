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




//get profile with id
Route::get('/profile/{id}',function($id){
    return view('profile')->with('id',$id);
})->name('profile');

Route::get('/edit-profile',function(){
    return view('editProfile');
})->name('editProfile');

Route::post('/update-profile','CreatesController@UpdateProfile');
Route::get('/generatePDF/{id}','CreatesController@generatePDF');

Route::get('/','CreatesController@home');
Route::get('/add', function(){
    return view('add');
});

Route::post('/insert','CreatesController@add');
Route::get('/update/{id}','CreatesController@update');
Route::post('/edit/{id}','CreatesController@edit');


Route::get('/delete/{id}','CreatesController@delete');

Route::post('/uploadPicture/{id}','CreatesController@updatePicture');

Route::get('/upload-picture/{id}','CreatesController@editPicture');

// for test use and this is how orginial route looks like - p.w.
Route::get('/test', function () {
    return 'Route works fine';
});

Route::get('/article/{id}','CreatesController@article');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/', 'CreatesController@home')->name('home');

//comments on articles
Route::post('/comments/{id}','CommentsController@store');
