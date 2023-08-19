<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

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
