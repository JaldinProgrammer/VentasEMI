<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::view('login', 'login')->name('login');
Route::post('login',[LoginController::class, 'login'])->name('log-in');

Route::get('user/perfil',[UserController::class, 'perfil'])->name('user.perfil');
Route::post('logout',[LoginController::class, 'logout'])->name('logout');
Route::post('user/create',[LoginController::class, 'create'])->name('user.create');

Route::get('people',[UserController::class, 'people'])->name('people.show');