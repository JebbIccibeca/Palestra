<?php


use App\Models\Upload;
use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Auth;
use App\Models\Uploadistr;
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

Route::get('/', 'App\Http\Controllers\DashboardController@dashboard');


Route::get('/abbonamenti', function () {
    return view('abbonamenti');
});


Route::group(['middleware' => ['auth']],function(){
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index');

    Route::get('/carrello','App\Http\Controllers\DashboardController@carrello');

    Route::get('/abbonati', function () {
        return view('abbonati');
    });
    Route::get('/profilo','App\Http\Controllers\DashboardController@profilo');
    Route::post('/edit','App\Http\Controllers\DashboardController@edit');
    Route::get('/mycorsi','App\Http\Controllers\DashboardController@mycorsi');

    //Aggiungi al carrello
    Route::post('add_to_cart','App\Http\Controllers\DashboardController@addtocart')->name('add_to_cart');
     //compra
     Route::get('dashboard/compra/','App\Http\Controllers\DashboardController@compra')->name('compra');
     //delete
     Route::get('/deletecart/{id}','App\Http\Controllers\DashboardController@deletecart')->name('deletecart');
     //abbonati
     Route::get('/abbonato','App\Http\Controllers\DashboardController@abbonato')->name('abbonato');
});

Route::group(['middleware'=> ['auth','role:user']], function(){
});

Route::group(['middleware'=> ['auth','role:admin']], function(){

    Route::get('/upload','App\Http\Controllers\UploadController@index');
    Route::get('/uploadistr','App\Http\Controllers\UploadController@index1');

    //form corsi
    Route::post('/store','App\Http\Controllers\UploadController@store')->name('store');
    //form istruttori
    Route::post('/storeistr','App\Http\Controllers\UploadController@storeistr')->name('storeistr');

    //eliminacorsi
    Route::get('/eliminacorsi','App\Http\Controllers\UploadController@corsi')->name('corsi');
    //editacorsi
    Route::get('editcorsi/{id_cors}','App\Http\Controllers\UploadController@editcorsi')->name('editcorsi');
    //editacorsi
    Route::post('editcorsi','App\Http\Controllers\UploadController@modifcorsi')->name('modifcorsi');
    //eliminacorsi
    Route::get('delete/{id}','App\Http\Controllers\UploadController@eliminacorsi')->name('eliminacorsi');


    //eliminaistruttori
    Route::get('/eliminaistr','App\Http\Controllers\UploadController@istruttori')->name('istruttori');
    //editaistruttori
    Route::get('/editistr/{id_istr}','App\Http\Controllers\UploadController@editistruttori')->name('editistruttori');
    //editacorsi
    Route::post('editistr','App\Http\Controllers\UploadController@modifistr')->name('modifistr');
    //eliminaistruttore
    Route::get('deleteistr/{id}','App\Http\Controllers\UploadController@eliminaistr')->name('eliminaistr');


    //eliminautente
    Route::get('/eliminautent','App\Http\Controllers\UploadController@utenti')->name('utenti');
    //editautenti
    Route::get('editutent/{id_utent}','App\Http\Controllers\UploadController@editutenti')->name('editcorsi');
    //editautenti
    Route::post('editutent','App\Http\Controllers\UploadController@modifutenti')->name('modifutenti');
    //eliminautente
    Route::get('deleteutent/{id}','App\Http\Controllers\UploadController@eliminautent')->name('eliminautent');


    //galleria
    Route::get('galleria/','App\Http\Controllers\UploadController@galleria')->name('galleria');
});

Route::group(['middleware'=> ['auth','role:istruttore']], function(){
    //miei
    Route::get('miei/','App\Http\Controllers\DashboardController@miei')->name('miei');
});


require __DIR__.'/auth.php';
