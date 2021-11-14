<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSupplierController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleDetailController;
use App\Http\Controllers\SupplierController;
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

Route::get('supplier/register',[SupplierController::class, 'register'])->name('supplier.register');
Route::get('supplier/show',[SupplierController::class, 'show'])->name('supplier.show');
Route::post('supplier/create',[SupplierController::class, 'create'])->name('supplier.create');
Route::get('supplier/edit/{id}',[SupplierController::class, 'edit'])->name('supplier.edit');
Route::post('supplier/update/{id}',[SupplierController::class, 'update'])->name('supplier.update');

Route::get('payment/register/{id}',[PaymentController::class, 'register'])->name('payment.register');
Route::get('payment/show/{id}',[PaymentController::class, 'show'])->name('payment.show');
Route::post('payment/create',[PaymentController::class, 'create'])->name('payment.create');
// Route::get('payment/edit/{id}',[PaymentController::class, 'edit'])->name('payment.edit');
// Route::post('payment/update/{id}',[PaymentController::class, 'update'])->name('payment.update');

// Route::get('sale/register/{id}',[SaleController::class, 'register'])->name('sale.register');
Route::get('sale/show/{id}',[SaleController::class, 'show'])->name('sale.show');
Route::get('sale/create/{id}',[SaleController::class, 'create'])->name('sale.create');

Route::get('product/register',[ProductController::class, 'register'])->name('product.register');
Route::get('product/show',[ProductController::class, 'show'])->name('product.show');
Route::post('product/create',[ProductController::class, 'create'])->name('product.create');
Route::get('product/edit/{id}',[ProductController::class, 'edit'])->name('product.edit');
Route::post('product/update/{id}',[ProductController::class, 'update'])->name('product.update');

Route::get('sales/details/show/{id}',[SaleDetailController::class, 'show'])->name('saleDetail.show');
Route::get('sales/details/register/{id}',[SaleDetailController::class, 'register'])->name('saleDetail.register');
Route::post('sales/details/create',[SaleDetailController::class, 'create'])->name('saleDetail.create');
Route::get('sales/details/edit/{id}',[SaleDetailController::class, 'edit'])->name('saleDetail.edit');
Route::post('sales/details/update/{id}',[SaleDetailController::class, 'update'])->name('saleDetail.update');


Route::get('product/supplier/register/{id}',[ProductSupplierController::class, 'register'])->name('productSupplier.register');
Route::get('product/supplier/show',[ProductSupplierController::class, 'show'])->name('productSupplier.show');
Route::post('product/supplier/create',[ProductSupplierController::class, 'create'])->name('productSupplier.create');

Route::get('category/register',[CategoryController::class, 'register'])->name('category.register');
Route::get('category/show',[CategoryController::class, 'show'])->name('category.show');
Route::post('category/create',[CategoryController::class, 'create'])->name('category.create');
Route::get('category/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/update/{id}',[CategoryController::class, 'update'])->name('category.update');

Route::get('invoice/exports/{id}',[InvoiceController::class, 'exports'])->name('invoice.exports');
