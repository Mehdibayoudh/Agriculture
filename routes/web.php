<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RessourceController;


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
    return view('Front.index');
});


//hné routes andhom nafs el name ama sa depand mel method  mesh test3amleha hakeka twali t pointi 3ali t7eb aliha
Route::post('/ressources', [RessourceController::class, 'createRessource']);
Route::get('/ressources', [RessourceController::class, 'fetchAll']);
Route::get('/ressources/{id}', [RessourceController::class, 'fetchById']);
Route::put('/ressources/{id}', [RessourceController::class, 'updateRessource']);
Route::delete('/ressources/{id}', [RessourceController::class, 'deleteRessource']);
