<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $title = 'Tukang Coretz | Home';
    return view('index' , compact('title'))->name('home');
});


