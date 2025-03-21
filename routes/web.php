<?php

use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\Admin\RegisterController;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $products = Product::with('category')->get()->take(6);
    $laptops = Product::whereHas('category', function ($query) {
        $query->where('name', 'Laptop');
    })->with('category')->get()->take(6);


    return Inertia::render('Client/Home', [
        'products' => $products,
        'laptops' => $laptops
    ]);
})->name('home');

Route::get('/products', function () {
    $products = Product::with('category')->get();
    $categories = Category::all();

    return Inertia::render('Client/Products', [
        'products' => $products,
        'categories' => $categories
    ]);
});

Route::get('/Laptop', function () {
    $laptops = Product::whereHas('category', function ($query) {
        $query->where('name', 'Laptop');
    })->with('category')->get();
    $categories = Category::all();

    return Inertia::render('Client/Laptops', [
        'laptops' => $laptops,
        'categories' => $categories
    ]);
});

Route::get('/Smartphone', function () {
    $smartphones = Product::whereHas('category', function ($query) {
        $query->where('name', 'Smartphone');
    })->with('category')->get();
    $categories = Category::all();

    return Inertia::render('Client/Smartphones', [
        'smartphones' => $smartphones,
        'categories' => $categories
    ]);
});

Route::get('/product/{id}', function ($id) {
    $product = Product::with('category')->find($id);

    return Inertia::render('Client/Details', [
        'product' => $product
    ]);
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        $categories_quantity = Category::count();
        $products_quantity = Product::count();
        $users_quantity = User::count();

        $categories = Category::withCount('products')->get();

        return Inertia::render('Admin/Dashboard', [
            'categories_quantity' => $categories_quantity,
            'products_quantity' => $products_quantity,
            'users_quantity' => $users_quantity,
            'categories' => $categories
        ]);
    })->name('admin.dashboard')->middleware('auth');

    Route::middleware('auth')->group(function () {
        Route::prefix("categories")->group((function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
            Route::post('/create', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::put('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
            Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        }));
    });

    Route::middleware('auth')->group(function () {
        Route::prefix("products")->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('products.index');
            Route::get('/create', [ProductController::class, 'create'])->name('products.create');
            Route::post('/create', [ProductController::class, 'store'])->name('products.store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
            Route::put('/update/{id}', [ProductController::class, 'update'])->name('products.update');
            Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
        });
    });
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
