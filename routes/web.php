<?php

use App\Http\Controllers\EventC\EventController;
use App\Http\Controllers\jardins\JardinController;
use App\Http\Controllers\jardins\backJardinController;
use App\Http\Controllers\PlanteController;
use App\Http\Controllers\RessourceController;
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
    return view('Front.index');
});
 Route::get('/admin', function () {
    return view('Back.home');
});

Route::resource('ressource', RessourceController::class);

//JARDINS


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
});



// Routes for admin users only
Route::middleware(['role:admin'])->group(function () {
    Route::resource('jardinBack', backJardinController::class);
    Route::patch('jardinBack/{id}/accept', [backJardinController::class, 'accept'])->name('jardinBack.accept');
    Route::patch('jardinBack/{id}/decline', [backJardinController::class, 'decline'])->name('jardinBack.decline');
});
/*
// Routes for simple users only
Route::middleware(['role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    // Add more user routes here
});
*/

//USER
Route::resource('event', EventController::class);
Route::get('plantes', [PlanteController::class, 'index']);
Route::get('/event', [EventController::class, 'index'])->name('Front.Event.index');
Route::post('/event', [EventController::class, 'store'])->name('Front.Event.store');
Route::put('/event/{id}', [EventController::class, 'update'])->name('events.update');
