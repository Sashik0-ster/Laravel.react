<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finances\ExpenseRequest;
use App\Http\Requests\Finances\IncomeRequest;
use App\Models\Finance\Account;
use App\Models\Finance\Category;
use App\Models\Finance\Currency;
use App\Models\Finance\Expense;
use App\Models\Finance\Income;
use App\Models\Finance\IncomeSource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use function React\Promise\all;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with(['category', 'account', 'currency'])
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(25);
        $currencies = Currency::all();
        $accounts = Account::where('user_id', auth()->id())->get();
        $categories = Category::all();
        $sources = IncomeSource::all();

        return view('pages.expenses', compact('expenses', 'currencies', 'accounts', 'categories', 'sources'));

    }

    public function store(ExpenseRequest $request)
    {

        $expense = $request->validated();

        Expense::create([
            'user_id' => auth()->id(),
            'category_id' => $expense['category_id'] ?: null, '',
            'account_id' => $expense['accounts'],
            'amount' => $expense['amount'],
            'currency_id' => $expense['currency'],
            'description' => $expense['description'],
            'is_recurring' => $request->is_recurring == 1,
            'expense_date' => $expense['expense_date'],
        ]);

        return redirect()->route('pages.expense')->with('success', 'Успіх');

    }

    public function destroy(Expense $expense): RedirectResponse
    {
//dd(request()->all());
        $expense->delete();

        return redirect()->back()->with('success', 'Запис видалено!');
    }

    public function update(ExpenseRequest $request, Expense $expense)
    {

//        dd($request->all(), $expense->getFillable());
        $expense->update([
            'category_id'  => $request->category_id,
            'account_id'   => $request->accounts,
            'currency_id'  => $request->currency,
            'amount'       => $request->amount,
            'expense_date' => $request->expense_date,
            'is_recurring' => $request->is_recurring == 1,
            'description'  => $request->description,
        ]);

        return redirect()->back()->with('success', 'Запис оновлено');
    }


}
