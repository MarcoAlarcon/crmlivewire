<?php

use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/', 'users.index');
Route::get('/register', Register::class)->name('auth.register');