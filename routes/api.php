<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
 * Menu Routes
 */
Route::group(['middleware' => ['auth:api'], 'prefix' => 'menu'], function () {
    Route::get('get', 'MenuController@get')->name('get');
    //Route::get('getWithRelations', 'MenuController@getWithRelations')->name('getWithRelations');
    Route::post('create', 'MenuController@create')->name('create');
    Route::group(['prefix' => '{id}'], function () {
        Route::get('get', 'MenuController@getById')->name('getById');
        Route::get('getWithRelations', 'MenuController@getByIdWithRelations')->name('getByIdWithRelations');
        Route::put('update', 'MenuController@updateById')->name('updateById');
        Route::delete('delete', 'MenuController@deleteById')->name('deleteById');
        Route::patch('attachCategory', 'MenuController@attachCategory')->name('attachCategory');
        Route::patch('detachCategory', 'MenuController@detachCategory')->name('detachCategory');
        Route::patch('syncCategory', 'MenuController@syncCategory')->name('syncCategory');
    });
});
Route::get('menu/getWithRelations', 'MenuController@getWithRelations')->name('getWithRelations');

Route::group(['middleware' => ['client'], 'prefix' => 'menu'], function () {
    //Route::get('getWithRelations', 'MenuController@getWithRelations')->name('getWithRelations');
});

/*
 * Category Routes
 */
Route::group(['middleware' => ['auth:api'], 'prefix' => 'category'], function () {
    Route::get('get', 'CategoryController@get')->name('get');
    Route::get('getWithRelations', 'CategoryController@getWithRelations')->name('getWithRelations');
    Route::post('create', 'CategoryController@create')->name('create');
    Route::group(['prefix' => '{id}'], function () {
        Route::get('get', 'CategoryController@getById')->name('getById');
        Route::get('getWithRelations', 'CategoryController@getByIdWithRelations')->name('getByIdWithRelations');
        Route::put('update', 'CategoryController@updateById')->name('updateById');
        Route::delete('delete', 'CategoryController@deleteById')->name('deleteById');
        Route::patch('attachDish', 'CategoryController@attachDish')->name('attachDish');
        Route::patch('detachDish', 'CategoryController@detachDish')->name('detachDish');
        Route::patch('syncDish', 'CategoryController@syncDish')->name('syncDish');
        Route::patch('attachMenu', 'CategoryController@attachMenu')->name('attachMenu');
        Route::patch('detachMenu', 'CategoryController@detachMenu')->name('detachMenu');
        Route::patch('syncMenu', 'CategoryController@syncMenu')->name('syncMenu');
    });
});

/*
 * Dish Routes
 */
Route::group(['middleware' => ['auth:api'], 'prefix' => 'dish'], function () {
    Route::get('get', 'DishController@get')->name('get');
    Route::get('getWithRelations', 'DishController@getWithRelations')->name('getWithRelations');
    Route::post('create', 'DishController@create')->name('create');
    Route::group(['prefix' => '{id}'], function () {
        Route::get('get', 'DishController@getById')->name('getById');
        Route::get('getWithRelations', 'DishController@getByIdWithRelations')->name('getByIdWithRelations');
        Route::put('update', 'DishController@updateById')->name('updateById');
        Route::delete('delete', 'DishController@deleteById')->name('deleteById');
        Route::patch('attachType', 'DishController@attachType')->name('attachType');
        Route::patch('detachType', 'DishController@detachType')->name('detachType');
        Route::patch('syncType', 'DishController@syncType')->name('syncType');
        Route::patch('attachCategory', 'DishController@attachCategory')->name('attachCategory');
        Route::patch('detachCategory', 'DishController@detachCategory')->name('detachCategory');
        Route::patch('syncCategory', 'DishController@syncCategory')->name('syncCategory');
    });
});

/*
 * Type Routes
 */
Route::group(['middleware' => ['auth:api'], 'prefix' => 'type'], function () {
    Route::get('get', 'TypeController@get')->name('get');
    Route::get('getWithRelations', 'TypeController@getWithRelations')->name('getWithRelations');
    Route::post('create', 'TypeController@create')->name('create');
    Route::group(['prefix' => '{id}'], function () {
        Route::get('get', 'TypeController@getById')->name('getById');
        Route::get('getWithRelations', 'TypeController@getByIdWithRelations')->name('getByIdWithRelations');
        Route::put('update', 'TypeController@updateById')->name('updateById');
        Route::delete('delete', 'TypeController@deleteById')->name('deleteById');
        Route::patch('attachDish', 'TypeController@attachDish')->name('attachDish');
        Route::patch('detachDish', 'TypeController@detachDish')->name('detachDish');
        Route::patch('syncDish', 'TypeController@syncDish')->name('syncDish');
    });
});