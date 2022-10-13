<?php

use Illuminate\Support\Facades\Auth;
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

Route::name('user.')->group(function(){
    Route::view('/admin', 'admin')->middleware('auth')->name('admin');

    Route::get('/login', function(){
        if(Auth::check()){
             return redirect(route('user.admin'));
        };
        return view('/login');
    })->name('login');

    Route::get('/registration', function(){
        if(Auth::check()){
            return redirect(route('user.admin'));
        };
        return view('/registration');
    })->name('registration');

//    Route::post('/login', []);
//    Route::post('/registration', []);
//    Route::get('/logout', [])->name('/logout');
});

Route::redirect('/', '/login');
