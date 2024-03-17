<?php

use App\Http\Controllers\WeightDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('/weight')->name('weight.')->controller(WeightDataController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'graph')->name('create');
        Route::post('/create', 'store')->name('post');
    });
});
