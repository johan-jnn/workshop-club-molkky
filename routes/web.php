<?php
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/events', 'events');
Route::view('/contact', 'contact');