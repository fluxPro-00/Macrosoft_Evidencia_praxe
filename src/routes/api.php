<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudijneprogramyController;
use App\Http\Controllers\PraxeController;

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
    Route::get('/studijneprogramy/{id}/praxe', 'praxFromProgram');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
