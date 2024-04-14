<?php

use App\Http\Controllers\Back_office\CRUD\GaresController;
use App\Http\Controllers\Back_office\CRUD\TrainController;
use App\Http\Controllers\Back_office\CRUD\UserController;
use App\Http\Controllers\Back_office\CRUD\VoyageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('Search', 'App\Http\Controllers\SearchController@index');
// Route::apiResource('/admin/voyage', VoyageController::class);
// Route::apiResource('/admin/gares', GaresController::class);
// Route::apiResource('/admin/trains', TrainController::class);
// Route::apiResource('/admin/Users', UserController::class);