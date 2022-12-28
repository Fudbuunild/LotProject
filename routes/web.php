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

Route::get('/', 'LotController@index')->name('home');
Route::post('store/lot', 'LotController@store')->name('store.lot');
Route::get('create/lot', 'LotController@create')->name('create.lot');
Route::get('edit/lot/{lot_id}', 'LotController@edit')->name('edit.lot');
Route::get('delete/lot/{lot_id}', 'LotController@delete')->name('delete.lot');
Route::put('update/lot/{category_id}', 'LotController@update')->name('update.lot');

// Аріхтетуру я зробив..., думаю цього достаньо
Route::get('create/category', 'CategoryController@create')->name('create.category');
Route::post('delete/category', 'CategoryController@delete')->name('delete.category');
Route::post('update/category', 'CategoryController@update')->name('update.category');
Route::post('store/category', 'CategoryController@store')->name('store.category');
