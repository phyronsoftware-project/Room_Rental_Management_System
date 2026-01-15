<?php

use App\Http\Controllers\admin\Tanants;
use Illuminate\Support\Facades\Route;

Route::get
Route::get('/tanants', [Tanants::class, 'index'])->name('tanants.index');
