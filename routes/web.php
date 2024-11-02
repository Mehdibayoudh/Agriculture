<?php


use App\Http\Controllers\EventController;
use App\Http\Controllers\jardins\JardinController;
use App\Http\Controllers\jardins\backJardinController;

use App\Http\Controllers\EventC\EventAdminController;
use App\Http\Controllers\PlanteController;
use App\Http\Controllers\PlanteCategorieController;
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
//JARDINS

Route::resource('event', EventController::class);
Route::resource('eventadmin', EventAdminController::class);
Route::resource('plante', PlanteController::class);
Route::get('jardins/{Id}/plante/', [PlanteController::class, 'index'])->name('listPlante');
Route::get('jardins/{id}/plante/create', [PlanteController::class, 'create'])->name('createPlante');
Route::get('jardins/{Id}/plante/{planteId}', [PlanteController::class, 'show'])->name('showPlante');
Route::get('jardins/{jardinId}/plante/{planteId}/edit', [PlanteController::class, 'edit'])->name('editPlante');
Route::resource('planteCategorie', PlanteCategorieController::class);
