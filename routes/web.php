<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\System\DashboardController;
use App\Http\Controllers\Notifications\NotificationController;
use App\Http\Controllers\Notifications\LogNotificationController;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\Channels\ChannelController;
use App\Http\Controllers\Users\UserController;


Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/home', [DashboardController::class, 'index'])->name('index');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::group(['prefix' => 'notifications', 'middleware'=>'auth'], function () {
    Route::get('/', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/index', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/pagination', [NotificationController::class, 'pagination'])->name('notifications.pagination');
    Route::get('/create', [NotificationController::class, 'create'])->name('notifications.create');
    Route::post('/store', [NotificationController::class, 'store'])->name('notifications.store');
    Route::get('/edit/{id}', [NotificationController::class, 'edit'])->name('notifications.edit');
});

Route::group(['prefix' => 'categories', 'middleware'=>'auth'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/pagination', [CategoryController::class, 'pagination'])->name('categories.pagination');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});


Route::group(['prefix' => 'channels', 'middleware'=>'auth'], function () {
    Route::get('/', [ChannelController::class, 'index'])->name('channels.index');
    Route::get('/index', [ChannelController::class, 'index'])->name('channels.index');
    Route::get('/pagination', [ChannelController::class, 'pagination'])->name('channels.pagination');
    Route::get('/create', [ChannelController::class, 'create'])->name('channels.create');
    Route::post('/store', [ChannelController::class, 'store'])->name('channels.store');
    Route::get('/edit/{id}', [ChannelController::class, 'edit'])->name('channels.edit');
    Route::put('/update/{id}', [ChannelController::class, 'update'])->name('channels.update');
    Route::delete('/destroy/{id}', [ChannelController::class, 'destroy'])->name('channels.destroy');
});

Route::group(['prefix' => 'users', 'middleware'=>'auth'], function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/pagination', [UserController::class, 'pagination'])->name('users.pagination');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::group(['prefix' => 'logs', 'middleware'=>'auth'], function () {
    Route::get('/pagination/{id}', [LogNotificationController::class, 'pagination'])->name('logs.pagination');
});