<?php

use App\Http\Controllers\ContactMessageController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/events', 'events');
Route::view('/contact', 'contact');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');
