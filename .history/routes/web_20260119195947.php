<?php

use App\Http\Controllers\admin\Auth;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\Dashboard;
use App\Http\Controllers\admin\Maintenance;
use App\Http\Controllers\admin\Payments;
use App\Http\Controllers\admin\Report;
use App\Http\Controllers\admin\Rooms;
use App\Http\Controllers\admin\Settings;
use App\Http\Controllers\admin\Tanants;
use Illuminate\Support\Facades\Route;




Route::get('/', [AuthController::class, 'login'])->name('login.index');
Route::post('/logout', [Auth::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard.index');

Route::get('/tanants', [Tanants::class, 'index'])->name('tanants.index');
Route::get('/tanants/create', [Tanants::class, 'createblade'])->name('tanants.createblade');



Route::get('/rooms', [Rooms::class, 'index'])->name('rooms.index');
Route::get('/rooms/create', [Rooms::class, 'createblade'])->name('rooms.createblade');
Route::get('/rooms/available', [Rooms::class, 'roomsavailable'])->name('rooms.roomsavailable');
Route::get('/rooms/occupied', [Rooms::class, 'rooms_occupied'])->name('rooms.rooms_occupied');

Route::get('/payments', [Payments::class, 'index'])->name('payments.index');


Route::get('/maintenance', [Maintenance::class, 'index'])->name('maintenance.index');
Route::get('/maintenance/create', [Maintenance::class, 'createblade'])->name('maintenance.createblade');




Route::get('/reports', [Report::class, 'index'])->name('reports.index');

Route::get('/settings', [Settings::class, 'index'])->name('settings.index');
Route::get('/setting/profile', [Settings::class, 'setting_profile'])->name('settings.setting_profile');
