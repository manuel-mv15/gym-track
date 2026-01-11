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



// Admin Routes
Route::get('/admin/exercises', App\Livewire\Admin\Exercises::class)->name('admin.exercises');

// User Routes
Route::prefix('user')->group(function () {
    Route::get('/chest', App\Livewire\User\Chest::class)->name('user.chest');
    Route::get('/biceps', App\Livewire\User\Biceps::class)->name('user.biceps');
    Route::get('/triceps', App\Livewire\User\Triceps::class)->name('user.triceps');
    Route::get('/back', App\Livewire\User\Back::class)->name('user.back');
    Route::get('/arms', App\Livewire\User\Arms::class)->name('user.arms');
    Route::get('/legs', App\Livewire\User\Legs::class)->name('user.legs');
    Route::get('/abs', App\Livewire\User\Abs::class)->name('user.abs');
});
