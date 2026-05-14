<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Finance\Currency;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $currencies = Currency::all();

        return view('pages.dashboard', compact('currencies'));
    }
}
