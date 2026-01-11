<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Http\Controllers\loginController;
Route::get('/', Home::class)->name('home');

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/register', 'register')->name('register');
});

Route::get('/loginFromView', Login::class)->name('loginFromView');
Route::get('/registerFromView', Register::class)->name('registerFromView');


