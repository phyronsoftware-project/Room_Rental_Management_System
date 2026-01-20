<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Auth extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
}
