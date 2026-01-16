<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Rooms extends Controller
{
    public function index()
    {
        return view('rooms.all_rooms');
    }
    public function createblade()
    {
        return view('room');
    }
}
