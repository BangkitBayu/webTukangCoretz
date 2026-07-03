<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController as ControllersProjectController;
use App\Http\Controllers\projectManagement\ProjectController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
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


    // Route categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Route testimonial
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::post('/testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/testimonial/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::put('/testimonial/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::patch('/testimonial/{id}/visibility', [TestimonialController::class, 'updateVisibility'])->name('testimonial.update-visibility');
    Route::delete('/testimonial/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
    // Route projects
    Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
    Route::post('/projects', [ProjectsController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}', [ProjectsController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectsController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectsController::class, 'destroy'])->name('projects.destroy');
});

require __DIR__ . '/auth.php';
