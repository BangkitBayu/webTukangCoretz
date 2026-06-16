<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController as ControllersProjectController;
use App\Http\Controllers\projectManagement\ProjectController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $title = "Tukang Coretz";
    return view('index', compact("title"));
})->name('index');

Route::get('/dashboard', function () {
    $pageName = "Dashboard";
    return view('dashboard', compact('pageName'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route projects
    Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');

    // Route categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    // Route testimonial
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::post('/testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/testimonial/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::put('/testimonial/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::put('/testimonial/{id}/active-status', [TestimonialController::class, 'updateActiveStatusTestimonial'])->name('testimonial.active-status');
    Route::delete('/testimonial/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
});

require __DIR__ . '/auth.php';
