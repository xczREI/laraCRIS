<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BirthCertificateController; // Add this line at the top!

Route::get('/', function () {
    return view('welcome');
});

// This single magic line creates all the routes you need (create, store, edit, etc.)
Route::resource('births', BirthCertificateController::class);
