<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\Usercontroller;

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

Route::get('/', function () {
    
    if(session()->has('user'))
    {
        return redirect('profile');
    }

    return redirect('index');
});

//Route::view("/login", "login");

Route::view("/register", "register");

Route::view("/profile", "profile");

Route::post('register', [Usercontroller::class,"register"]);

Route::post('login', [Usercontroller::class,"login"]);

Route::get('/login', function () {
    if(session()->has('user'))
    {
        return redirect('profile');
    }

    return view('index');
});

Route::get('/logout', function () {
    if(session()->has('user'))
    {
        session()->pull('user'); //delete session
    }

    return view('index');
});