<?php

use App\Http\Controllers\FriendController;
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

    Route::prefix('/friend')->name('friend.')->controller(FriendController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}/add', 'add')->name('add');
        Route::post('/{id}/remove', 'remove')->name('remove');
    });

    Route::prefix('/weight')->name('weight.')->controller(WeightDataController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
    });
});
