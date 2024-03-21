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

    Route::get('friend', [FriendController::class, 'index'])->name('friend');
    Route::get('friend/{id}/add', [FriendController::class, 'add'])->name('friend.add');
    Route::get('friend/{id}/remove', [FriendController::class, 'remove'])->name('friend.remove');

    Route::prefix('/weight')->name('weight.')->controller(WeightDataController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
    });
});
