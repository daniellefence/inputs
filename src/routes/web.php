<?php
use Illuminate\Support\Facades\Route;

Route::get('/df-inputs/js', function () {
    return response()->file(__DIR__.'/../../resources/js/trix.umd.min.js', [
        'Content-Type' => 'application/javascript',
    ]);
})->name('df.inputs.trix.js');

Route::get('/df-inputs/css', function () {
    return response()->file(__DIR__.'/../../resources/css/trix.min.css', [
        'Content-Type' => 'text/css',
    ]);
})->name('df.inputs.trix.css');