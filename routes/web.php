<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhotoController;

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

Route::get('/login', function () {
    return view('Login.Index');
})->middleware('guest');


Route::get('/register', function () {
    return view('Register.index');
})->middleware('guest');


Route::get('/dashboard', function () {
    return view('Dashboard.index');
})->middleware('guest');


Route::get('/aan', function () {
    return view('welcome');
});

// Route::get('/login', function () {
//     return view('Login.Index');
// });

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/login', [LoginController::class, 'index'])->middleware('guest');

// Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

// CRUD SESSION

Route::get('/dashboard/home', function () {
    return view('Dashboard.Home');
})->middleware('guest');

Route::resource('/dashboard/photos', PhotoController::class)->middleware('auth');