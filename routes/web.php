<?php

use App\Http\Controllers\EventC\EventAdminController;
use App\Http\Controllers\EventC\EventController;
use App\Http\Controllers\JardinController;
use App\Http\Controllers\PlanteController;
use App\Http\Controllers\RessourceC\RessourceController;
use App\Http\Controllers\RessourceC\RessourceAdminController;
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
    return view('welcome');
});
Route::get('/front', function () {
    return view('Front.index-2');
});
Route::get('/admin', function () {
    return view('Back.home');
});

Route::resource('ressource', RessourceController::class);
Route::resource('ressourceadmin', RessourceAdminController::class);


Route::resource('jardins', JardinController::class);
Route::resource('event', EventController::class);
Route::resource('eventadmin', EventAdminController::class);
Route::get('plantes', [PlanteController::class, 'index']);
Route::resource('plante', PlanteController::class);
