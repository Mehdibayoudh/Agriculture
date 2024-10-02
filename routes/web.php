<?php

use App\Http\Controllers\JardinController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\PlanteController;

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
    return view('welcome');
});
Route::get('/front', function () {
    return view('Front.index-2');
});

Route::resource('ressource', RessourceController::class);

Route::resource('jardins', JardinController::class);
Route::resource('event', EventController::class);
Route::get('plantes', [PlanteController::class, 'index']);
Route::get('/event', [EventController::class, 'index'])->name('Front.Event.index');
Route::post('/event', [EventController::class, 'store'])->name('Front.Event.store');
Route::put('/event/{id}', [EventController::class, 'update'])->name('events.update');


