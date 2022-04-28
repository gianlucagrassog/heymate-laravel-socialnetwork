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
    return redirect()->route("login");
});

Auth::routes(["reset" => false]);// login - registe -verify => false - reset
Route::post("/verifica_username","Auth\RegisterController@verifica_username")->name("verifica_username");

Route::group(['middleware' => ['auth']], function () { 
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/home/like', 'HomeController@like')->name('like');
    Route::post('/home/dislike', 'HomeController@dislike')->name('dislike');
    Route::post('/home/userslike', 'HomeController@userslike')->name('userslike');

    Route::get('/searchpeople', 'SearchpeopleController@index')->name('searchpeople');
    Route::post('/searchpeople/searchp', 'SearchpeopleController@searchpeople')->name('searchp');
    Route::post('/searchpeople/follow', 'SearchpeopleController@follow')->name('follow');
    Route::post('/searchpeople/unfollow', 'SearchpeopleController@unfollow')->name('unfollow');
    
    Route::get('/createpost', 'CreatepostController@index')->name('createpost');
    Route::post('/createpost/dosearchcontent', 'CreatepostController@dosearch')->name('dosearchcontent');
    Route::post('/newcontent', 'CreatepostController@newcontent')->name('newcontent');

    Route::get('/getpost','HomeController@getpost')->name('getpost');
    
});





