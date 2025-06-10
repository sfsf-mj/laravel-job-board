<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // signup(get)
    public function showSignupForm()
    {
        return view('auth.signup', ['pageTitle' => 'Sign Up']);
    }

    // signup(post)
    public function signup(SignupRequest $request)
    {
        // Create the user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        // Log the user in
        auth()->login($user);

        // Redirect to the home page
        return redirect('/')->with('notification', [
            'type' => 'success',
            'message' => 'Registration successful! Welcome, ' . $user->name . '!'
        ]);
    }

    // login(get)
    public function showLoginForm()
    {
        return view('auth.login', ['pageTitle' => 'Login']);
    }

    // login(post)
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        // Attempt to log the user in
        if (auth()->attempt($credentials)) {
            // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect to the home page
            return redirect('/')->with('notification', [
                'type' => 'success',
                'message' => 'Login successful! Welcome back, ' . auth()->user()->name . '!'
            ]);
        }

        // Redirect back with an error message
        return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->withInput()->with('notification', [
            'type' => 'error',
            'message' => 'Login failed! Please check your credentials and try again.'
        ]);
    }

    // logout
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('notification', [
            'type' => 'success',
            'message' => 'You have been logged out successfully.'
        ]);
    }
}
