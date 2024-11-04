<?php

use App\Http\Controllers\EventC\EventController;
use App\Http\Controllers\jardins\JardinController;
use App\Http\Controllers\jardins\backJardinController;

use App\Http\Controllers\EventC\EventAdminController;

use App\Http\Controllers\PlanteController;
use App\Http\Controllers\PlanteCategorieController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\SponsorAdminController;
use App\Http\Controllers\UserController;
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
    return view('Front.index-2');
});
 Route::get('/admin', function () {
    return view('Back.home');
});

Route::resource('ressource', RessourceController::class);

//JARDINS



//USER
Route::middleware('guest')->group(function () {
    Route::get('/register', function () {return view('Front.user.register');})->name('registerPage');
    Route::get('/login', function () {return view('Front.user.login');})->name('loginPage');
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

// Routes accessibles uniquement aux utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    //Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::resource('jardins', JardinController::class);
    Route::get('/jardinier-gardens', [JardinController::class, 'jardinierGardens'])->name('getJardinierGardens');
    Route::post('/caption', [JardinController::class, 'caption'])->name('caption');
    Route::post('jardins/review', [JardinController::class, 'storeReview'])->name('reviews.store');
    Route::resource('event', EventController::class);

});



// Routes for admin users only
Route::middleware(['role:admin'])->group(function () {
    Route::resource('jardinBack', backJardinController::class);
    Route::patch('jardinBack/{id}/accept', [backJardinController::class, 'accept'])->name('jardinBack.accept');
    Route::patch('jardinBack/{id}/decline', [backJardinController::class, 'decline'])->name('jardinBack.decline');
    Route::resource('sponsoradmin', SponsorAdminController::class);
    Route::resource('eventadmin', EventAdminController::class);
    Route::resource('planteCategorie', PlanteCategorieController::class);

});
/*
// Routes for simple users only
Route::middleware(['role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    // Add more user routes here
});
*/

//USER

Route::get('plantes', [PlanteController::class, 'index']);
Route::resource('plante', PlanteController::class);
Route::get('jardins/{Id}/plante/', [PlanteController::class, 'index'])->name('listPlante');
Route::get('jardins/{id}/plante/create', [PlanteController::class, 'create'])->name('createPlante');
Route::get('jardins/{Id}/plante/{planteId}', [PlanteController::class, 'show'])->name('showPlante');
Route::get('jardins/{jardinId}/plante/{planteId}/edit', [PlanteController::class, 'edit'])->name('editPlante');
