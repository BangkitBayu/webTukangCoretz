<?php

use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\auth\logoutController;
use App\Http\Controllers\projectManagement\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $title = 'Tukang Coretz';
    return view('index', compact('title'));
});

Route::get('/login', function () {
    $title = 'Tukang Coretz | Login';
    return view('auth.login', compact('title'));
});

Route::middleware(['admin'])->group(function () {
    Route::post('/logout', logoutController::class);
    Route::resource('/admin', AdminController::class);
    Route::resource('/admin/projects', ProjectController::class);
});
