<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Landing\AboutController;
use App\Http\Controllers\Landing\IndexController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AccessLogController;
use App\Http\Controllers\Backend\CommodityController;
use App\Http\Controllers\Backend\CommunityController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Landing\ProductionController;
use App\Http\Controllers\Backend\ActivityLogController;
use App\Http\Controllers\Backend\PublicationController;
use App\Http\Controllers\Landing\ContactController as ContactLanding;
use App\Http\Controllers\Frontend\ProfileController as CommunityProfile;
use App\Http\Controllers\Frontend\CommunityController as CommunityFrontend;
use App\Http\Controllers\Frontend\DashboardController as CommunityDashboard;
use App\Http\Controllers\Landing\PublicationController as PublicationLanding;
use App\Http\Controllers\Frontend\ProductionController as CommunityProduction;

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
    Route::group(['as' => 'landing.'], function() {
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::get('/tentang', [AboutController::class, 'index'])->name('about');
        Route::get('/data-produksi', [ProductionController::class, 'index'])->name('production');
        Route::get('/publikasi', [PublicationLanding::class, 'index'])->name('publication');
        Route::group(['as' => 'contact.'], function() {
            Route::get('/kontak', [ContactLanding::class, 'index'])->name('index');
            Route::post('/kontak', [ContactLanding::class, 'store'])->name('store');
        });
    });

    Route::group(['prefix' => 'community', 'as' => 'community.', 'middleware' => ['auth', 'role:community']], function() {
        Route::get('/dashboard', [CommunityDashboard::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'profiles', 'as' => 'profiles.'], function () {
            Route::get('/', [CommunityProfile::class, 'index'])->name('index');
            Route::put('/{id}/biodata', [ProfileController::class, 'updateBiodata'])->name('biodata');
            Route::put('/{id}/setting', [ProfileController::class, 'updatesetting'])->name('setting');
        });

        Route::resource('communities', CommunityFrontend::class)->parameters(['communities' => 'id'])->only(['index', 'edit', 'update']);
        Route::resource('productions', CommunityProduction::class)->parameters(['productions' => 'id'])->except(['show']);
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
        Route::resource('contacts', ContactController::class)->parameters(['contacts' => 'id'])->only(['index']);
        Route::group(['prefix' => 'logs', 'as' => 'logs.'], function() {
            Route::resource('activities', ActivityLogController::class)->parameters(['activities' => 'id'])->only(['index']);
            Route::resource('accesses', AccessLogController::class)->parameters(['accesses' => 'id'])->only(['index']);
        });
    });
});
