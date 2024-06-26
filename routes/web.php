<?php

use App\Http\Controllers\FriendController;
use App\Http\Controllers\FriendRequestController;
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
    });

    Route::prefix('/friend')->name('friend.')->controller(FriendRequestController::class)->group(function () {
        Route::get('/{id}/request', 'request')->name('request');
        Route::get('/{id}/cancel', 'cancel')->name('cancel');
        Route::get('/{id}/accept', 'accept')->name('accept');
        Route::get('/{id}/reject', 'reject')->name('reject');
        Route::get('/{id}/remove', 'remove')->name('remove');
    });

    Route::prefix('/weight')->name('weight.')->controller(WeightDataController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/graph', 'graph')->name('graph');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });
});
