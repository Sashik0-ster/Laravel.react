<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finances\IncomeRequest;
use App\Models\Finance\Account;
use App\Models\Finance\Category;
use App\Models\Finance\Currency;
use App\Models\Finance\Income;
use App\Models\Finance\IncomeSource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
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

        return view('pages.incomes', compact(
            'incomes', 'currencies', 'accounts', 'categories', 'sources'
        ));
    }

    public function store(IncomeRequest $request)
    {

//        dd($request->all());
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
            'is_recurring' => $request->is_recurring == 1,
            'income_date' => $data['income_date'],
        ]);


        return redirect()
            ->route('pages.income')
            ->with('success', 'Дохід створено!');
    }

    public function destroy(Income $income): RedirectResponse
    {
        $income->delete();

        return redirect()->back()->with('success', 'Дохід видалено!');
    }

    public function update(IncomeRequest $request, Income $income)
    {
        $income->update([
            'amount' => $request->amount,
            'account_id' => $request->accounts,
            'currency_id' => $request->currency,
            'source_id' => $request->income_sources,
            'income_date' => $request->income_date,
            'is_recurring' => $request->is_recurring == 1,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Запис оновлено');
    }

}
