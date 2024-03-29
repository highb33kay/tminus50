<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
	return view('welcome');
});

Route::group(['middleware' => 'web'], function () {
	Route::get('login', [AuthController::class, 'login'])->name('login');
	Route::post('login', [AuthController::class, 'postLogin'])->name('postLogin');
	Route::get('register', [AuthController::class, 'register'])->name('register');
	Route::post('register', [AuthController::class, 'postRegister'])->name('postRegister');
	Route::get('logout', [AuthController::class, 'logout'])->name('logout');
	Route::get('role', [AuthController::class, 'role'])->name('role');
});
