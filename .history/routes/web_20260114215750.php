<?php

use App\Http\Controllers\admin\Dashboard;
use App\Http\Controllers\admin\Tanants;
use Illuminate\Support\Facades\Route;

Route::get('/', [Dashboard::class, 'index'])->name('dashboard.index');
Route::get('/tanants', [Tanants::class, 'index'])->name('tanants.index');
Rou
