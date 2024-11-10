<?php

use App\Http\Controllers\EventC\EventController;
use App\Http\Controllers\jardins\JardinController;
use App\Http\Controllers\jardins\backJardinController;

use App\Http\Controllers\EventC\EventAdminController;

use App\Http\Controllers\PlanteController;
use App\Http\Controllers\RessourceC\RessourceController;
use App\Http\Controllers\RessourceC\RessourceAdminController;
use App\Http\Controllers\PlanteCategorieController;
use App\Http\Controllers\SponsorAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherApiController;
use App\Http\Controllers\WishlistC\WishlistController;
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


// Ressource & Wishlist & weather api
Route::resource('ressource', RessourceController::class);
Route::resource('ressourceadmin', RessourceAdminController::class);

Route::resource('wishlists', WishlistController::class);
Route::post('wishlists/add-ressource/{ressource}', [WishlistController::class, 'addRessource'])->name('wishlists.add-ressource');
Route::post('wishlists/{wishlist}/detach-ressource/{ressource}', [WishlistController::class, 'detachRessource'])->name('wishlists.detach-ressource');
Route::get('wishlists/{wishlist}', [WishlistController::class, 'show'])->name('wishlists.show');

Route::get('/weather', [WeatherApiController::class, 'showWeather'])->name('weather.show');


//JARDINS



//USER
Route::middleware('guest')->group(function () {
    Route::get('/register', function () {
        return view('Front.user.register');
    })->name('registerPage');
    Route::get('/login', function () {
        return view('Front.user.login');
    })->name('loginPage');
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

// Routes accessibles uniquement aux utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    //Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::resource('jardins', JardinController::class);
    // Route for searching gardens
    Route::get('/gardens/search', [JardinController::class, 'search'])->name('searchGardens');

    Route::post('/caption', [JardinController::class, 'caption'])->name('caption');
    Route::post('jardins/review', [JardinController::class, 'storeReview'])->name('reviews.store');
    Route::resource('event', EventController::class);
    Route::get('events/{id}', [EventController::class, 'show'])->name('event.show');
    Route::get('plantes', [PlanteController::class, 'index']);
    Route::resource('plante', PlanteController::class);
    Route::get('jardins/{Id}/plante/', [PlanteController::class, 'index'])->name('listPlante');
    Route::get('jardins/{id}/plante/create', [PlanteController::class, 'create'])->name('createPlante');
    Route::get('jardins/{Id}/plante/{planteId}', [PlanteController::class, 'show'])->name('showPlante');
    Route::get('jardins/{jardinId}/plante/{planteId}/edit', [PlanteController::class, 'edit'])->name('editPlante');
    Route::get('jardins/{jardinId}/plante/{planteId}/showOtherPlants', [PlanteController::class, 'showOtherPlants'])->name('showOtherPlants');
    Route::post('/events/{event}/participate', [EventController::class, 'participate'])->name('events.participate');
});



// Routes for admin users only
Route::middleware(['role:admin'])->group(function () {
    Route::resource('jardinBack', backJardinController::class);
    Route::patch('jardinBack/{id}/accept', [backJardinController::class, 'accept'])->name('jardinBack.accept');
    Route::patch('jardinBack/{id}/decline', [backJardinController::class, 'decline'])->name('jardinBack.decline');
    Route::resource('sponsoradmin', SponsorAdminController::class);
    Route::resource('eventadmin', EventAdminController::class);
    Route::resource('planteCategorie', PlanteCategorieController::class);
    Route::post('/generate-image', [EventAdminController::class, 'generateImage'])->name('generate.image');
});
// Routes for admin users only
Route::middleware(['role:jardinier'])->group(function () {
    Route::get('/jardinier-gardens', [JardinController::class, 'jardinierGardens'])->name('getJardinierGardens');
});
/*
// Routes for simple users only
Route::middleware(['role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    // Add more user routes here
});
*/

//USER
