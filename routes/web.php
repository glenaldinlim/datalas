<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CommodityController;
use App\Http\Controllers\Backend\CommunityController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PublicationController;
use App\Http\Controllers\Frontend\ProfileUserController;
use App\Http\Controllers\Frontend\CommunityDashboardController;

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
Auth::routes(['register' => false, 'password.*' => false]);

Route::group(['as' => 'front.'], function() {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::group(['prefix' => 'community', 'as' => 'community.', 'middleware' => ['auth', 'role:community']], function() {
        Route::get('/dashboard', [CommunityDashboardController::class, 'index'])->name('dashboard');
    });
});

Route::group(['prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', 'role:bod|webmaster|admin']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => '/users/profiles', 'as' => 'users.profiles.'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::put('/email', [ProfileController::class, 'updateEmail'])->name('update.email');
        Route::put('/password', [ProfileController::class, 'updatePassword'])->name('update.password');
        Route::put('/', [ProfileController::class, 'updateProfile'])->name('update.profile');
    });
    Route::resource('users', UserController::class)->parameters(['users' => 'id'])->except(['show']);
    Route::resource('categories', CategoryController::class)->parameters(['categories' => 'id'])->except(['show']);
    Route::resource('commodities', CommodityController::class )->parameters(['commodities' => 'id']);
    Route::resource('communities', CommunityController::class)->parameters(['communities' => 'id']);
    Route::resource('publications', PublicationController::class)->parameters(['publications' => 'id']);

    Route::group(['prefix' => 'misc', 'as' => 'misc.'], function() {
        Route::resource('settings', SettingController::class)->parameters(['settings' => 'id'])->only(['index', 'edit', 'update']);
    });
});

Route::group(['prefix' => 'community', 'as' => 'frontend.', 'middleware' => ['auth', 'role:community']], function() {
    Route::get('/dashboard', [CommunityDashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => '/users/profiles', 'as' => 'users.profiles.'], function () {
        Route::get('/', [ProfileUserController::class, 'index'])->name('index');
        Route::put('/email', [ProfileUserController::class, 'updateEmail'])->name('update.email');
        Route::put('/password', [ProfileUserController::class, 'updatePassword'])->name('update.password');
        Route::put('/', [ProfileUserController::class, 'updateProfile'])->name('update.profile');
    });

});
