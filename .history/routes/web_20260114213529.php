<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.dashboard');
});
Route::get('/tanants', [App\Http\Controllers\admin\Tanants::class, 'index'])->name('tanants.index');
