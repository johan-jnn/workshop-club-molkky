<?php

use App\Http\Controllers\ContactMessageController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::get('/about', function () {
  return view('about');
});

Route::get('/events', function () {
  return view('events');
});

Route::get('/contact', function () {
  return view('contact');
});

Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');