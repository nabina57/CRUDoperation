<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
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


Route::get('/form',[CustomerController::class,'index'])->name('customer.create');  //to fill form
Route::post('/form',[CustomerController::class,'register']); //after form is filled and inserted in db
Route::get('/form/view',[CustomerController::class,'view']); 
Route::get('/form/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');
Route::get('/form/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
Route::post('/form/update/{id}',[CustomerController::class,'update'])->name('customer.update');