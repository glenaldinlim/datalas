<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CommunityController;
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
    // Communities
    Route::group(['prefix' => '/communities', 'as' => 'communities.'], function () {
        // FrontEnd
        Route::get('/', [CommunityController::class, 'index'])->name('index');
        Route::get('/create', [CommunityController::class, 'renderCreateView'])->name('createView');
        Route::get('/{id}/edit', [CommunityController::class, 'renderEditView'])->name('editView');

        // Backend
        Route::post('/store', [CommunityController::class, 'store'])->name('store');
        Route::put('/{id}/edit', [CommunityController::class, 'edit'])->name('edit');
        Route::delete('/{id}/delete', [CommunityController::class, 'delete'])->name('delete');
    });
});
