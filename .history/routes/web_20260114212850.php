<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.dashboard');
});
Route::get('/tanan')
