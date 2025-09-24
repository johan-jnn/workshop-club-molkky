<?php

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
