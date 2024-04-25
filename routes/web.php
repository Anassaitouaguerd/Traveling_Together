<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Back_office\CRUD\AdminUsers\AdminUsersController;
use App\Http\Controllers\Back_office\CRUD\GaresController;
use App\Http\Controllers\Back_office\CRUD\TrainController;
use App\Http\Controllers\Back_office\CRUD\UserController;
use App\Http\Controllers\Back_office\CRUD\VoyageController;
use App\Http\Controllers\Back_office\Statistique\StatistiqueController;
use App\Http\Controllers\Front_office\Profile\ProfileController;
use App\Http\Controllers\Front_office\Reservations\ReservationsController;
use App\Http\Controllers\Front_office\Reservations\SendEmail;
use App\Http\Controllers\Front_office\SearchController;
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


Route::get('/home', function () {
    return view('Front-office.homepage');
});
Route::get('/train', function () {
    return view('Front-office.components.trains');
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
Route::get('/forgotPage', function () {
    return view('Front-office.Forgot-password.forgot');
});

# part dashboard 

Route::get('/admin/dashboard', [StatistiqueController::class, "index"]);

# parte Authentication 

Route::post('/newSingup', [AuthController::class, 'newSingup']);
Route::get('/log-out', [AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgotPass', [AuthController::class, 'forgotPass']);
Route::get('/reset/{token}', [AuthController::class, 'resetPage']);
Route::post('/reset/{token}', [AuthController::class, 'resetPassword']);

# parte front office 

Route::post('Search', [SearchController::class, 'index']);
Route::post('/SearchTrains', [SearchController::class, 'FindTrains']);
Route::get('/By-ticket/{id}', [ReservationsController::class, 'index']);
Route::post('/reserve-place', [ReservationsController::class, 'resrvation']);
Route::get('/My-profile', [ProfileController::class, 'profileView'])->middleware("CheckAuth");
Route::get('/My-ticket/{reservation_id}', [ReservationsController::class, 'ticketPage']);
Route::post('/Send-emailThanks', [SendEmail::class, 'sendEmail']);

Route::middleware('CheckAdmin')->group(function () {
    Route::resources([
        '/admin/voyage' => VoyageController::class,
        '/admin/gare' => GaresController::class,
        '/admin/train' => TrainController::class,
        '/admin/crud/user' => AdminUsersController::class
    ]);
});

Route::middleware('CheckAuth')->group(function () {
    Route::resources([
        '/admin/user' => UserController::class
    ]);
});