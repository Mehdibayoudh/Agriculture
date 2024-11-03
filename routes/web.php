<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\jardins\JardinController;
use App\Http\Controllers\jardins\backJardinController;
use App\Http\Controllers\PlanteController;
use App\Http\Controllers\RessourceController;
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


Route::get('/', function () {
    return view('Front.index');
});
 Route::get('/admin', function () {
    return view('Back.home');
});

Route::resource('ressource', RessourceController::class);

//JARDINS
Route::resource('jardins', JardinController::class);
Route::get('/jardinier-gardens', [JardinController::class, 'jardinierGardens'])->name('getJardinierGardens');

Route::resource('jardinBack', backJardinController::class);
Route::patch('jardinBack/{id}/accept', [backJardinController::class, 'accept'])->name('jardinBack.accept');
Route::patch('jardinBack/{id}/decline', [backJardinController::class, 'decline'])->name('jardinBack.decline');
Route::post('/caption', [JardinController::class, 'caption'])->name('caption');
Route::post('jardins/review', [JardinController::class, 'storeReview'])->name('reviews.store');

//JARDINS

Route::resource('event', EventController::class);
Route::get('plantes', [PlanteController::class, 'index']);
Route::get('/event', [EventController::class, 'index'])->name('Front.Event.index');
Route::post('/event', [EventController::class, 'store'])->name('Front.Event.store');
Route::put('/event/{id}', [EventController::class, 'update'])->name('events.update');
