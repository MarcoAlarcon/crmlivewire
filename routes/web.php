<?php

use App\Livewire\Auth\Register;
use App\Livewire\Login;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/', 'users.index')->name('home');
Route::get('/register', Register::class)->name('auth.register');
Route::get('/login', Login::class)->name('auth.login');