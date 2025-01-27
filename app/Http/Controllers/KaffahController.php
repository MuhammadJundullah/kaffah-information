<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kaffah;

class KaffahController extends Controller
{
    public function index()
    {
        $data = kaffah::all();
        return view('home', compact('data'));
    }
}
