<?php

use App\Http\Controllers\admin\Dashboard;
use App\Http\Controllers\admin\Payments;
use App\Http\Controllers\admin\Rooms;
use App\Http\Controllers\admin\Tanants;
use Illuminate\Support\Facades\Route;

Route::get('/', [Dashboard::class, 'index'])->name('dashboard.index');
Route::get('/tanants', [Tanants::class, 'index'])->name('tanants.index');
Route::get('/rooms', [Rooms::class, 'index'])->name('rooms.index');
Route::get('/payments', [Payments::class, 'index'])->name('payment.index');
