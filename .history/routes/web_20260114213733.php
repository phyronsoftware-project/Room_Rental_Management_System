<?php

use App\Http\Controllers\admin\Tanants;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.dashboard');
});
Route::get('/tanants', [Tanants::class, 'index'])->name('tanants.index');
