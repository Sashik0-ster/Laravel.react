<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finances\IncomeRequest;
use App\Models\Finance\Account;
use App\Models\Finance\Currency;
use App\Models\Finance\Income;
use App\Models\Finance\IncomeSource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    public function index()
    {
        $income_sources = IncomeSource::all();
        $incomes = Income::all();
        Income::with(['account', 'currency', 'source'])->get();
        $currencies = Currency::all();
        $accounts = Account::all();

        return view('pages.incomes', compact('income_sources', 'incomes', 'currencies', 'accounts'));
    }

    public function create(IncomeRequest $request)
    {

        dd($request->all());
//
        $data = $request->validated();
        $isRecurring = $request->boolean('is_recurring') ? 1 : 2;

        Income::create([
            'user_id' => auth()->id(),
            'account_id' => $data['accounts'],
            'amount' => $data['amount'],
            'currency_id' => $data['currency'],
            'income_source_id' => $data['income_sources'],
            'description' => $data['description'],
            'is_recurring' => $isRecurring,
            'income_date' => $data['income_date'],
        ]);


        return redirect()
            ->route('pages.income')
            ->with('success', 'Дохід успішно зафіксовано!');
    }
}
