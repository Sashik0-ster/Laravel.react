<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finances\ExpenseRequest;
use App\Models\Finance\Account;
use App\Models\Finance\Category;
use App\Models\Finance\Currency;
use App\Models\Finance\Expense;
use App\Models\Finance\Income;
use App\Models\Finance\IncomeSource;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with(['category', 'account', 'currency'])
            ->latest()
            ->paginate(25);
        $currencies = Currency::all();
        $accounts = Account::all();
        $categories = Category::all();

        return view('pages.expenses', compact('expenses', 'currencies', 'accounts', 'categories'));

    }

    public function store(ExpenseRequest $request)
    {


        $expense = $request->validated();

        Expense::create([
            'user_id' => auth()->id(),
            'category_id' => $expense['name_category'],
            'account_id' => $expense['accounts'],
            'amount' => $expense['amount'],
            'currency_id' => $expense['currency'],
            'description' => $expense['description'],
            'is_recurring' => $request->is_recurring == 1,
            'expense_date' => $expense['expense_date'],
        ]);

        return redirect()->route('pages.expense')->with('success', 'Успіх');

    }

}
