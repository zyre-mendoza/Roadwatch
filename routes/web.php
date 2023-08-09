<?php

use App\Http\Controllers\PangasinanController;
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

Route::get('/', 'OutletMapController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/about', 'AboutController@index')->name('about.page');

Route::get('/contact', 'ContactController@index')->name('contact.page');



Route::get('list', [PangasinanController::class, 'show']);
/*
 * Outlets Routes
 */
Route::get('/schools', 'OutletMapController@index')->name('outlet_map.index');
Route::resource('outlets', 'OutletController')->middleware('auth');
