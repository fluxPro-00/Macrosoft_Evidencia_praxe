<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudijneprogramyController;
use App\Http\Controllers\PraxeController;
use App\Http\Controllers\PouzivatelController;
use App\Http\Controllers\ZastupcafirmyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(StudijneprogramyController::class)->group(function () {
    Route::get('/studijneprogramy', 'index');
    Route::get('/studijneprogramy/{id}', 'show');
});

Route::controller(PraxeController::class)->group(function () {
    Route::get('/praxe', 'index');
    Route::get('/praxe/{id}', 'show');
    Route::get('/studijneprogramy/{id}/praxe', 'praxFromProgram');
});

Route::controller(PouzivatelController::class)->group(function () {
    Route::get('/pouzivatel', 'index');
    Route::get('/pouzivatel/{id}', 'show');
});

Route::controller(ZastupcafirmyController::class)->group(function () {
    Route::get('/zastupcafirmy', 'index');
    Route::post('/zastupcafirmy', 'store');
    Route::get('/zastupcafirmy/{id}', 'show');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
