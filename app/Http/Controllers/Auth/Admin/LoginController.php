<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function index() {
        return Inertia::render('Admin/Auth/Login');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (FacadesAuth::attempt($validated)) {
            $request->session()->regenerate();

            return to_route('admin.dashboard');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Sorry!!! Invalid credentials'
        ]);
    }
}
