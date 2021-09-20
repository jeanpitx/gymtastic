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

Auth::routes(['verify' => true]);

Route::get('user/locked', 'Auth\ControlUserController@locked')
->name('locked')->middleware('locked:home');

//bloquea el acceso a las url dentro que no esten verificadas por correo
Route::group(['middleware' => ['verified','locked:next']], function () {

    Route::group(['middleware' => ['password_expired:expired']], function () {

        Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

        Route::resource('enlaces', 'EnlaceController');
        Route::resource('internas', 'InternaController');
        Route::resource('archives', 'ArchiveController');
        Route::resource('parametros', 'ParametroController');
        
        //RUTAS DE CORREOS
        Route::resource('emails', 'EmailController');
        Route::patch('/emails', 'EmailController@indexFilter')->name('emails.post.index');
        Route::get('/emails/config/masive', 'EmailController@masive')->name('emails.masive');
        Route::post('/emails/send/masive', 'EmailController@masiveSend')->name('emails.masivesend');

        Route::resource('roles', 'RoleUserController');

    });

    Route::get('password/expired', 'Auth\ControlUserController@expired')
    ->name('password.expired');
    Route::post('password/post_expired', 'Auth\ControlUserController@postExpired')
    ->name('password.post_expired');

});


//****************RUTAS PÚBLICAS
//RUTAS DE SHOW INDEX
Route::get('/', 'ShowInfoController@index')->name('main');
Route::get('/content/{page}', 'ShowInfoController@interna')->name('content');
Route::get('/content/productos/{page}', 'ShowInfoController@categoria')->name('category');
Route::get('/cid/{id}', 'ShowInfoController@getCidProtect')->name('getcid');
Route::get('/cidsoli/{id}', 'ShowInfoController@getCidSolicita')->name('getcidsoli');
Route::get('/cidpublic/{id}', 'ShowInfoController@getCidPublic')->name('getcidpublic');
Route::get('/apiprovinces', 'ShowInfoController@getApiProvinces')->name('provinces');
Route::post('/store/landing', 'ShowInfoController@landingStore')->name('landing.store');

Route::get('/solicitudesbcm/visabcm', 'ShowInfoController@solicitudSimple')->name('solicita');


Route::get('/mantenimiento', 'ShowInfoController@mantenimiento')->name('mantenimiento');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('checkIp');


Route::get('/mianalisisonlinev2/hep/index', 'ShowInfoController@jota')->name('jota');
Route::post('/mianalisisonlinev2/hep/resultado', 'ShowInfoController@jotapost')->name("posthep");
