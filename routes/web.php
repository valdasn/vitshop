<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['prefix' => 'categories'], function () {
    Route::get('', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/map{category}', [CategoryController::class, 'map'])->name('category.map');
    Route::get('create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('update/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('delete/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('show/{category}', [CategoryController::class, 'show'])->name('category.show');
});



require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
