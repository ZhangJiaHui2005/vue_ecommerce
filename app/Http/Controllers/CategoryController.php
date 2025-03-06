<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return Inertia::render('Admin/Category/Category', [
            'categories' => $categories
        ]);
    }

    public function create() {
        return Inertia::render('Admin/Category/Create');
    }

    public function store(Request $request) {
        Category::create($request->validate([
            'name' => ['required', 'max:255', 'unique:categories'],
            'description' => ['max:1000']
        ]));

        return to_route('categories.index');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return Inertia::render('Admin/Category/Edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->update($request->validate([
            'name' => ['required', 'max:255', 'unique:categories'],
            'description' => ['max:1000']
        ]));

        return to_route('categories.index');
    }

    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return to_route('categories.index');
    }
}
