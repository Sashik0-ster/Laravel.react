<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Finance\Account;
use App\Models\Finance\Category;
use App\Models\Finance\Currency;
use App\Models\Finance\Goal;
use App\Models\Finance\IncomeSource;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {

        $goals = Goal::where('user_id', auth()->id())->get();
        $currencies = Currency::all();
        $categories = Category::all();
        $sources = IncomeSource::all();
        $accounts = Account::where('user_id', auth()->id())->get();

        return view('pages.goals', compact('goals', 'currencies', 'accounts', 'categories', 'sources'));
    }

    public function store(Request $request)
    {

        return redirect()->route('pages.goal')->with('success', 'Ціль створена.');

    }

    public function update(Request $request, Goal $goal)
    {
        return redirect()->route('pages.goal')->with('success', 'Yo');
    }
}
