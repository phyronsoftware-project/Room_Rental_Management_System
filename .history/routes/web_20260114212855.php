<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.dashboard');
});
Route::get('/tanants', function () {
    return view('dashboard.tanants');
});
