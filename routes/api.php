<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\ProvinceController;
use App\Http\Controllers\API\v1\ProductionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'v1'], function() {
    Route::get('/productions', [ProductionController::class, 'index']);
    
    Route::get('/provinces', [ProvinceController::class, 'index']);
    Route::get('/provinces/{id}', [ProvinceController::class, 'show']);
});
