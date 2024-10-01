<?php

use Illuminate\Support\Facades\Route;
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
    return view('Front.index');
});

Route::get('plantes', [PlanteController::class, 'index']);
