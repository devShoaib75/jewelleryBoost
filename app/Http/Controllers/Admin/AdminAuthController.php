<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\AuthenticationException;

class AdminAuthController extends Controller
{
    /**
     * Show admin login form
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle admin login
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return back()
                ->withErrors(['credentials' => 'Email or password is incorrect'])
                ->withInput($request->only('email'));
        }

        // Check if user is admin (ID = 1)
        if ($user->id !== 1) {
            return back()
                ->withErrors(['credentials' => 'You do not have admin access'])
                ->withInput($request->only('email'));
        }

        // Create token for API access
        $token = $user->createToken('admin_session')->plainTextToken;

        // For web-based login, store in session
        auth('web')->login($user, remember: $request->boolean('remember'));

        return redirect()->route('admin.dashboard')->with('success', 'Welcome back, ' . $user->name . '!');
    }

    /**
     * Logout admin user
     */
    public function logout(Request $request)
    {
        auth('web')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out');
    }
}
