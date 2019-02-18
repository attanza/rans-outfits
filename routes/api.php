<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->namespace('Api')->group(function () {
    /**
     * Products
     */
    Route::get('products', 'ProductController@index');
    Route::post('products', 'ProductController@store');
    Route::put('products/{id}', 'ProductController@update');

    /**
     * Product Descriptions
     */
    Route::get('product-descriptions', 'ProductDescriptionController@index');
    Route::post('product-descriptions', 'ProductDescriptionController@store');
    Route::put('product-descriptions/{id}', 'ProductDescriptionController@update');

    Route::get('combo-data', 'ComboDataController@index');

});
