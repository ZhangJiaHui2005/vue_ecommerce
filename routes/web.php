<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Admin/Dashboard');
    });

    Route::prefix("categories")->group((function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    }));
});