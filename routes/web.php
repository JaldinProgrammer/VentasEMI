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
Route::get('user/register/{id}',[LoginController::class, 'register'])->name('user.register');
Route::get('user/show',[LoginController::class, 'show'])->name('user.show');
Route::get('user/showDeleted',[LoginController::class, 'showDeleted'])->name('user.showDeleted');
Route::get('user/delete/{id}',[LoginController::class, 'delete'])->name('user.delete');
Route::get('user/restore/{id}',[LoginController::class, 'restore'])->name('user.restore');

Route::get('people/register',[UserController::class, 'register'])->name('people.register');
Route::get('people',[UserController::class, 'people'])->name('people.show');
Route::post('people/create',[UserController::class, 'create'])->name('people.create');
Route::get('people/edit/{id}',[UserController::class, 'edit'])->name('people.edit');
Route::post('people/update/{id}',[UserController::class, 'update'])->name('people.update');
Route::get('people/delete/{id}',[UserController::class, 'delete'])->name('people.delete');
Route::get('people/restore/{id}',[UserController::class, 'restore'])->name('people.restore');
Route::get('people/showDeleted',[UserController::class, 'showDeleted'])->name('people.showDeleted');