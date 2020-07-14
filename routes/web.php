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

Auth::routes();


Route::get('/', 'CategoryController@showCategories');
Route::get('/showCatNews/{id}', 'NewsController@showCatNews')->name('showCatNews');
Route::get('/showNewsItem/{id}', 'NewsController@showNewsItem')->middleware('viewsCount')->name('showNewsItem');




Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'DashboardController@index')->name('home');

    Route::get('/createCategory', 'CategoryController@createCategory')->name('createCat');
    Route::get('/editCategory/{id}', 'CategoryController@editCategory')->name('editCat');
    Route::post('/patchCategory', 'CategoryController@patchCategory')->name('patchCat');
    Route::post('/putCategory', 'CategoryController@putCategory')->name('putCat');


    Route::get('/createNews', 'NewsController@createNews')->name('createNews');
    Route::get('/editNews/{id}', 'NewsController@editNews')->name('editNews');
    Route::post('/patchNews', 'NewsController@patchNews')->name('patchNews');
    Route::post('/putNews', 'NewsController@putNews')->name('putNews');

});


