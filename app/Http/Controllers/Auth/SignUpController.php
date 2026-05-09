<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\RegistrationRequest;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function index()
    {
        return view('pages.Auth.sign-up');
    }

    public function registration(RegistrationRequest $request)
    {

        $data = $request->validated();

        User::create($data);

        return redirect()->route('login');
    }
}
