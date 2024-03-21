<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Front_office\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin/dashboard', function () {
    return view('Back-office.dashboard');
});
Route::get('/home', function () {
    return view('Front-office.homepage');
});
Route::get('/', function () {
    return view('Front-office.homepage');
});
Route::get('/sign-up', function () {
    return view('Front-office.signup');
});
Route::get('/login', function () {
    return view('Front-office.login');
});
Route::get('/index', function () {
    return view('Front-office.index');
});
Route::get('/admin/Trains', function () {
    return view('Back-office.Trains');
});
Route::get('/forgotPage', function () {
    return view('Front-office.Forgot-password.forgot');
});

# parte Authentication 

Route::post('/newSingup', [AuthController::class, 'newSingup']);
Route::get('/log-out', [AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgotPass', [AuthController::class, 'forgotPass']);

# parte front office 

Route::post('Search', [SearchController::class, 'index']);
Route::post('/SearchTrains', [SearchController::class, 'FindTrains']);