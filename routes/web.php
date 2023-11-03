<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;


Route::get('/', [ListingController::class, 'index'])->name('listings.index');

Route::get('/new', [ListingController::class, 'create'])
    ->name('listings.create');

Route::post('/new', [ListingController::class, 'store'])
    ->name('listings.store');

    Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
        return view('dashboard', [
            'listings' => $request->user()->listings
        ]);
    })->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

Route::get('/{listings}', [ListingController::class, 'show'])
->name('listings.show');

Route::get('/{listing}/apply', [ListingController::class, 'apply'])
    ->name('listings.apply');