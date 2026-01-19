<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Settings extends Controller
{
    public function index()
    {
        return view(view: 'settings.settings');
    }
    public function sett()
    {
        return view(view: 'settings.settings');
    }
}
