<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function index() {
        return Inertia::render('Admin/Auth/Register');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        User::create($validated);

        $request->session()->regenerate();

        return to_route('admin.dashboard');
    }
}
