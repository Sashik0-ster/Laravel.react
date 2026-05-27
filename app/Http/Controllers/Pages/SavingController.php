<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Finance\Saving;
use Illuminate\Http\Request;

class SavingController extends Controller
{
    public function index()
    {

        return view('pages.savings');
    }
}
