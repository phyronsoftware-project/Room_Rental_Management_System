<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Tanants extends Controller
{
    public function index()
    {
        return view('tenants.tenants');
    }
    public function createblade()
    {
        return view('tenants.tenants_create');
    }
      Route::post('/tanants', [Tanants::class, 'store'])->name('tanants.store');

    Route::get('/tanants/{tenant}/show', [Tanants::class, 'show'])->name('tanants.show');
    Route::get('/tanants/{tenant}/edit', [Tanants::class, 'edit'])->name('tanants.edit');
    Route::put('/tanants/{tenant}', [Tanants::class, 'update'])->name('tanants.update');
    Route::delete('/tanants/{tenant}', [Tanants::class, 'destroy'])->name('tanants.destroy');
}
