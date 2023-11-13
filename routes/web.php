<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;


Route::get('/', function () {
    return redirect('/series');
});


#Route::get('/series','App\Http\Controllers\SeriesController@listarSeries');

#Route::get('/series/criar','App\Http\Controllers\SeriesController@create');

#Route::post('/series/criar','App\Http\Controllers\SeriesController@store');


//Rotas de Series
Route::controller(SeriesController::class)->group(function(){
    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/create','create')->name('series.create');
    Route::post('/series/create','store')->name('series.store');
    Route::post('/series/destroy/{serie}','destroy')->name('series.destroy');
    Route::get('/series/edit/{serie}','edit')->name('series.edit');
    Route::post('/series/update','update')->name('series.update');
});

//Rotas de Seasons
Route::get('/series/{series}/seasons',
    'App\Http\Controllers\SeasonsController@index')->name('seasons.index');

//Rotas de Episodes
Route::get('/seasons/{season}/episodes',
    'App\Http\Controllers\EpisodesController@index')->name('episodes.index');




