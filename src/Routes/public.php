<?php

// Add web middleware for use Laravel feature
Route::group(['middleware' => 'web'], function () {

    //add admin prefix and middleware for admin area
    Route::post('/contact', 'Tir\Contact\Http\Controllers\PublicContactController@contact')->name('contact.submit');

});