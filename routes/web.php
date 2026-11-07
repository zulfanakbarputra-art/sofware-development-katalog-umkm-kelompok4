<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CatalogController::class, 'index'])->name('home');
Route::post('/pesan', OrderController::class)->middleware('throttle:20,1')->name('order');
