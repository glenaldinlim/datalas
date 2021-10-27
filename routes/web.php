<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
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
Auth::routes(['register' => false]);

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
});
