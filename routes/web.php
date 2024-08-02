<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\Food_helpController;
use App\Http\Controllers\frontend\ViewController;
use App\Http\Controllers\frontend\Mahana_kifalatController;
use App\Http\Controllers\frontend\QurbaniController;

Route::get('/',[HomeController::class,'index']);
Route::get('/food_help',[Food_helpController::class,'index'])->name('food_help.index');
Route::post('/food_help/store', [Food_helpController::class, 'store'])->name('food_help.store');

Route::post('/food_help/payments/store', [Food_helpController::class, 'store_payments'])->name('food_help.payments.store');
Route::post('/food_help/update', [Food_helpController::class, 'update'])->name('food_help.update');

Route::get('/payments/{id}', [Food_helpController::class, 'payments'])->name('food.help.donor.payments');

Route::get('/view_details/{id}',[ViewController::class,'index'])->name('view.details');
Route::get('/mahana_kifalat',[Mahana_kifalatController::class,'index']);
Route::get('/qurbani',[QurbaniController::class,'index']);
