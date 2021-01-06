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


Route::get('/','Frontend\FrontendController@welcome')->name('welcome');

Route::namespace('Frontend')->prefix('acdev')->group(function(){

    Route::get('/projets','FrontendController@projets')->name('acdev.projets');

    Route::get('/projets/detail-projet/{titre}','FrontendController@detail_projet')->name('projet-detail');

    Route::get('/partenaires','FrontendController@partenaires')->name('acdev.partenaires');

    Route::get('/partenaires/show/{nom}','FrontendController@detail_projet')->name('projet-detail');

    Route::get('/presentation','FrontendController@presentation')->name('presentation');

    Route::get('/contact','FrontendController@contact')->name('contact');
});

Route::namespace('Backend')->prefix('acdev-admin')->group(function(){

    Route::get('/','AdminController@index');

    Route::resource('types', 'TypeController');

    Route::resource('etats','EtatController');

    Route::resource('projets', 'ProjetsController');

    Route::resource('partenaires', 'PartenaireController');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');