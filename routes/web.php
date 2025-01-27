<?php

use App\Http\Controllers\KaffahController;
use Illuminate\Support\Facades\Route;
use App\Models\kaffah;

Route::get('/', [KaffahController::class, 'index']);
