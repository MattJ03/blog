<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/index', [BlogController::class, 'index']);
Route::post('/store/blogs', [BlogController::class, 'store']);
