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

Route::group(['middleware' => ['auth']],function(){
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

Route::group(['middleware'=> ['auth','role:user']], function(){
    //Aggiungi al carrello
    Route::post('add_to_cart','App\Http\Controllers\DashboardController@addtocart');
    //delete
    Route::get('/deletecart/{id}','App\Http\Controllers\DashboardController@deletecart')->name('deletecart');
    //acquisti
    Route::get('/acquisti','App\Http\Controllers\DashboardController@acquisti')->name('acquisti');
    //compra
    Route::get('dashboard/compra/','App\Http\Controllers\DashboardController@compra')->name('compra');
});

Route::group(['middleware'=> ['auth','role:admin']], function(){
    Route::get('/calendario','App\Http\Controllers\DashboardController@calendario')->name('calendario');

    Route::get('/upload','App\Http\Controllers\UploadController@index');

    //carica
    Route::post('/store','App\Http\Controllers\UploadController@store')->name('store');

    //stampa
    Route::get('/galleria','App\Http\Controllers\UploadController@show')->name('show');

    //elimina
    Route::get('/elimina','App\Http\Controllers\UploadController@elimina')->name('elimina');

    //delete
    Route::get('/delete/{id}','App\Http\Controllers\UploadController@delete')->name('delete');


});


require __DIR__.'/auth.php';
