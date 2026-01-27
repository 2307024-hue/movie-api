<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request) {
        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->noContent();
        }
        return response()->json(['message' => 'Login Gagal'], 401);
    }

    public function destroy(Request $request) {
        Auth::guard('web')->logout();
        return response()->noContent();
    }
}