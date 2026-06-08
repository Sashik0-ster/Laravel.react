<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finances\GoalRequest;
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

    public function store(GoalRequest $request)
    {
//        dd($request->all());
        $data = $request->validated();

        Goal::create([
            'user_id' => auth()->id(),
            'goal_name' => $data['goal_name'],
            'target_amount' => $data['target_amount'],
            'current_amount' => $data['current_amount'],
            'currency_id' => $data['currency'],
            'deadline' => $data['deadline'],
            'priority' => $data['priority'],
            'status' => 'active',
        ]);

        return redirect()->route('pages.goal')->with('success', 'Ціль створена.');

    }

    public function update(Request $request, Goal $goal)
    {
        return redirect()->route('pages.goal')->with('success', 'Yo');
    }
}
