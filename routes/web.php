<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post("/api/register", "App\Http\Controllers\RequestLog@Register")->name("reg");
Route::post("/api/login", "App\Http\Controllers\RequestLog@Login")->name("login");
