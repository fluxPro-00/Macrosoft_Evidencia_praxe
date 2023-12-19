<?php

use App\Http\Controllers\StudentiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FirmyController;
use App\Http\Controllers\StudijneprogramyController;
use App\Http\Controllers\PracoviskaController;
use App\Http\Controllers\PraxeController;
use App\Http\Controllers\PouzivatelController;
use App\Http\Controllers\PoverenizamestnanciController;
use App\Http\Controllers\ReportpracoviskoController;
use App\Http\Controllers\SpatnavazbazastupcaController;
use App\Http\Controllers\VeduciController;
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

Route::controller(FirmyController::class)->group(function () {
    Route::get('/firmy', 'index');
    Route::post('/firmy', 'store');
    Route::get('/firmy/{id}', 'show');
    Route::put('/firmy/{id}', 'update');
    Route::delete('/firmy/{id}', 'destroy');
});

Route::controller(StudijneprogramyController::class)->group(function () {
    Route::get('/studijneprogramy', 'index');
    Route::get('/studijneprogramy/{id}', 'show');
});

Route::controller(PracoviskaController::class)->group(function () {
    Route::get('/pracoviska', 'index');
    Route::post('/pracoviska', 'store');
    Route::get('/pracoviska/{id}', 'show');
    Route::put('/pracoviska/{id}', 'update');
    Route::delete('/pracoviska/{id}', 'destroy');
});

Route::controller(PraxeController::class)->group(function () {
    Route::get('/praxe', 'index');
    Route::get('/praxe/schvalene', 'schvalene');
    Route::get('/praxe/archivovane', 'archivovane');
    Route::get('/praxe/{id}', 'show');
    Route::get('/praxe/{id}/stav', 'stav');
    Route::get('/praxe/{id}/typ', 'typ');
    Route::get('/praxe/{id}/archivovat', 'archivovat');
    Route::get('/praxe/{id}/studenti', 'studenti');
    Route::get('/studijneprogramy/{id}/praxe', 'praxFromProgram');
    Route::put('/praxe/{id}/updateHodnotenie', 'updateHodnotenie');
});

Route::controller(PouzivatelController::class)->group(function () {
    Route::get('pouzivatel', 'index');
    Route::post('pouzivatel', 'store');
    Route::get('pouzivatel/{id}', 'show');
    Route::put('pouzivatel/{id}', 'update');
    Route::delete('pouzivatel/{id}', 'destroy');
});

Route::controller(PoverenizamestnanciController::class)->group(function () {
    Route::get('/poverenizamestnanci', 'index');
    Route::post('/poverenizamestnanci', 'store');
    Route::get('/poverenizamestnanci/{id}', 'show');
    Route::put('/poverenizamestnanci/{id}', 'update');
    Route::delete('/poverenizamestnanci/{id}', 'destroy');
});

Route::controller(ReportpracoviskoController::class)->group(function () {
    Route::get('/pracovisko/report', 'index');
    Route::get('/pracovisko/report/{id}', 'show');
    Route::get('/pracovisko/{idPracovisko}/report', 'indexForPracovisko');
    Route::get('/pracovisko/{idPracovisko}/report/{idReport}', 'showForPracovisko');
    Route::post('/pracovisko/report', 'store');
});

Route::controller(SpatnavazbazastupcaController::class)->group(function () {
    Route::get('/zastupcafirmy/spatnavazba', 'index');
    Route::post('/zastupcafirmy/spatnavazba', 'store');
    Route::get('/zastupcafirmy/spatnavazba/{id}', 'show');
    Route::get('/zastupcafirmy/{id}/spatnavazba', 'zastupca');
});

Route::controller(StudentiController::class)->group(function () {
    Route::get('/studenti', 'index');
    Route::post('/studenti', 'store');
    Route::get('/studenti/{id}', 'show');
    Route::delete('/studenti/{id}', 'destroy');
    Route::put('/studenti/{id}', 'update');
    Route::get('/studenti/osvedcenia', 'osvedcenia');
    Route::put('/studenti/{id}/updateSchvalenyVykaz', 'updateSchvalenyVykaz');

});

Route::controller(VeduciController::class)->group(function () {
    Route::get('/veduci', 'index');
    Route::post('/veduci', 'store');
    Route::get('/veduci/{id}', 'show');
    Route::put('/veduci/{id}', 'update');
    Route::delete('/veduci/{id}', 'destroy');
});

Route::controller(ZastupcafirmyController::class)->group(function () {
    Route::get('/zastupcafirmy', 'index');
    Route::post('/zastupcafirmy', 'store');
    Route::get('/zastupcafirmy/{id}', 'show');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
