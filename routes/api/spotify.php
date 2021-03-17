<?php


use Illuminate\Support\Facades\Route;

// SERVICE
Route::group(['prefix' => 'api'], function () {
    Route::get('/v1/albums', 'SpotifyController@getAlbumsbyBandName');
});

