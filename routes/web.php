<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
    Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);
    Route::get('/users/create', [\App\Http\Controllers\UserController::class, 'create']);
    Route::get('/users/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit']);
    Route::put('/users/{id}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);

    Route::get('videos', [\App\Http\Controllers\VideoController::class, 'index']);
    Route::post('videos', [\App\Http\Controllers\VideoController::class, 'store']);
    Route::get('videos/create', [\App\Http\Controllers\VideoController::class, 'create']);
    Route::get('videos/{id}/edit', [\App\Http\Controllers\VideoController::class, 'edit']);
    Route::put('videos/{id}', [\App\Http\Controllers\VideoController::class, 'update']);
    Route::delete('videos/{id}', [\App\Http\Controllers\VideoController::class, 'destroy']);

    Route::get('materis', [\App\Http\Controllers\MateriController::class, 'index']);
    Route::post('materis', [\App\Http\Controllers\MateriController::class, 'store']);
    Route::get('materis/create', [\App\Http\Controllers\MateriController::class, 'create']);
    Route::get('materis/{id}/edit', [\App\Http\Controllers\MateriController::class, 'edit']);
    Route::put('materis/{id}', [\App\Http\Controllers\MateriController::class, 'update']);
    Route::delete('materis/{id}', [\App\Http\Controllers\MateriController::class, 'destroy']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
