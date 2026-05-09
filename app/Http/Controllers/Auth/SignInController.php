<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function index()
    {
        return view('pages.Auth.sign-in');
    }

    public function signIn(LoginRequest $request)
    {
        $request->validated();
        $data = $request->only('email', 'password');

        $remember = $request->boolean('remember');
//        dd($request->all());
        if (Auth::attempt($data, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard')->with('success', 'З поверненням!');
        }

        return back()->withErrors([
            'email' => 'Невірний email або пароль.',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
