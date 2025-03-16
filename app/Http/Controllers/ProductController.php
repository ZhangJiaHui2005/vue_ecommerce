<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();

        return Inertia::render('Admin/Product/Product', [
            'products' => $products
        ]);
    }

    public function create() {
        $categories = Category::all();

        return Inertia::render('Admin/Product/Create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['max:1000'],
            'price' => ['required', 'numeric'],
            'stock_quantity' => ['required', 'numeric'],
            'image_url' => ['required', 'image','mimes:jpeg,png,jpg,gif','max:2048'],
            'category_id' => ['required']
        ]);

        $imagePath = $request->file('image_url') ? $request->file('image_url')->store('products', 'public') : null;

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'image_url' => $imagePath,
            'category_id' => $request->category_id
        ]);

        return to_route('products.index');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();

        return to_route('categories.index');
    }
}
