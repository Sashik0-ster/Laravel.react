<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Finance\Account;
use App\Models\Finance\Currency;
use App\Models\Finance\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {

        $goals = Goal::where('user_id', auth()->id())->get();
        $currencies = Currency::all();
        $accounts = Account::where('user_id', auth()->id())->get();

        return view('pages.goals', compact('goals', 'currencies', 'accounts'));
    }
}
