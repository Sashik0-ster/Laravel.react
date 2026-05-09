<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Finance\Currency;
use App\Models\Finance\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        return view('pages.incomes');
    }

    public function create(Request $request)
    {
        $data = $request->validate([]);

        Income::create($data);

        $currencies = Currency::all();

        return view('pages.incomes' , compact('currencies'));
    }
}
