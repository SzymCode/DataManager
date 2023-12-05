<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('abilities:user');

    Route::prefix('users')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')
            ->middleware('abilities:users-index');
        Route::get('/{id}', 'show')
            ->middleware('abilities:users-show');
        Route::post('/', 'store')
            ->middleware('abilities:users-store');
        Route::put('/{id}', 'update')
            ->middleware('abilities:users-update');
        Route::post('/{id}', 'destroy')
            ->middleware('abilities:users-destroy');
    });

    Route::prefix('contacts')->controller(ContactController::class)->group(function () {
        Route::get('/', 'index')
            ->name('contacts.index')
            ->middleware('abilities:contacts-index');
        Route::get('/{id}', 'show')
            ->name('contacts.show')
            ->middleware('abilities:contacts-show');
        Route::post('/', 'store')
            ->name('contacts.store')
            ->middleware('abilities:contacts-store');
        Route::put('/{id}', 'update')
            ->name('contacts.update')
            ->middleware('abilities:contacts-update');
        Route::delete('/{id}', 'destroy')
            ->name('contacts.destroy')
            ->middleware('abilities:contacts-destroy');
    });
});