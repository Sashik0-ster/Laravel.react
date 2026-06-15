<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Finance\Currency;
use App\Models\Finance\Income;
use App\Models\Finance\Account;
use App\Models\Finance\Category;
use App\Models\Finance\IncomeSource;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $incomes = Income::with(['account', 'currency', 'source'])
            ->where('user_id', auth()->id())
            ->get();
        $currencies = Currency::all();
        $accounts = Account::where('user_id', auth()->id())->get();
        $categories = Category::all();
        $sources = IncomeSource::all();

        return view('pages.dashboard', compact('incomes', 'currencies', 'accounts', 'categories', 'sources'));
    }
}
