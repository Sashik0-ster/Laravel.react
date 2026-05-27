<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finances\AccountRequest;
use App\Models\Finance\Account;
use App\Models\Finance\Currency;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function index()
    {
        $currencies = Currency::all();
        $accounts = Account::where('user_id', auth()->id())->get();

        return view('pages.accounts', compact('currencies', 'accounts'));
    }

    public function create(AccountRequest $request)
    {

        $data = $request->validated();

        $exists = Account::where([
            ['user_id', '=', auth()->id()],
            ['name', '=', $data['name']],
            ['currency_id', '=', $data['currency']]
        ])->exists();


        if ($exists) {
            return redirect()
                ->route('pages.accounts')
                ->with('error', 'Рахунок вже існує!');
        }

        Account::create([
            'user_id' => auth()->id(),
            'name' => $data['name'],
            'balance' => $data['balance'],
            'currency_id' => $data['currency'],
            'type' => $data['type'],
        ]);

        return redirect()
            ->route('pages.accounts')
            ->with('success', 'Рахунок успішно додано!');
    }


    public function destroy(Account $account)
    {
    }


}
