<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NavbarController extends Controller
{

    public function index()
    {
        $user = User::auth()->id();


        return view('components.navbar', compact('user'));
    }

}
