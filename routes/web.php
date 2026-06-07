<?php

use App\Http\Controllers\Pages\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\DashboardController;
use App\Http\Controllers\Pages\ExpenseController;
use App\Http\Controllers\Pages\GoalController;
use App\Http\Controllers\Pages\IncomeController;
use App\Http\Controllers\Pages\SavingController;
use App\Http\Controllers\Pages\SettingController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\MainPageController;

/*Route::get('/', function () {
    return view('pages.mainpage');
});

if(Auth::check(auth())){

}

Route::name('pages.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/expense', [ExpenseController::class, 'index'])->name('expense');
    Route::get('/goal', [GoalController::class, 'index'])->name('goal');
    Route::get('/income', [IncomeController::class, 'index'])->name('income');
    Route::get('/saving', [SavingController::class, 'index'])->name('saving');
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
});

Route::get('/mainpage', [MainPageController::class, 'index'])->name('pages.mainpage');

Route::get('/sign-up', [SignUpController::class, 'index'])->name('sign-up');
Route::get('/sign-in', [SignInController::class, 'index'])->name('sign-in');

Route::post('/sign-up', [SignUpController::class, 'registration'])->name('registration');
Route::post('/sign-in', [SignInController::class, 'signIn'])->name('login');*/

// Головна сторінка
Route::get('/', function () {
    if (empty(request()->cookie('remember_token'))) {
        return view('pages.mainpage');
    }
    return view('pages.Auth.sign-in');
});

// МАРШРУТИ ДЛЯ ГІСТЬ (Тільки для неавторизованих)
Route::middleware('guest')->group(function () {
    // Реєстрація
    Route::get('/sign-up', [SignUpController::class, 'index'])->name('sign-up');
    Route::post('/sign-up', [SignUpController::class, 'registration'])->name('registration');

    // Вхід
    Route::get('/sign-in', [SignInController::class, 'index'])->name('login');
    Route::post('/sign-in', [SignInController::class, 'signIn'])->name('login.post');
});

// ЗАХИЩЕНІ МАРШРУТИ (Тільки для авторизованих)
Route::middleware('auth')->group(function () {

    Route::name('pages.')->group(callback: function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/accounts', [AccountController::class, 'index'])->name('accounts');
        Route::get('/expense', [ExpenseController::class, 'index'])->name('expense');
        Route::get('/goal', [GoalController::class, 'index'])->name('goal');

        // Доходи
        Route::get('/income', [IncomeController::class, 'index'])->name('income');

        Route::get('/saving', [SavingController::class, 'index'])->name('saving');
        Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    });

    // Доходи
    Route::post('/income', [IncomeController::class, 'store'])->name('income.create');
    Route::put('/income/{income}', [IncomeController::class, 'update'])->name('income.update');
    Route::delete('/income/{income}', [IncomeController::class, 'destroy'])->name('income.destroy');

    //Витрати
    Route::post('/expense', [ExpenseController::class, 'store'])->name('expense.create');
    Route::put('/expense/{expense}', [ExpenseController::class, 'update'])->name('expense.update');
    Route::delete('/expense/{expense}', [ExpenseController::class, 'destroy'])->name('expense.destroy');

    //Цілі
    Route::post('/goal', [GoalController::class, 'store'])->name('goal.create');
    Route::put('/goal/{goal}', [GoalController::class, 'update'])->name('goal.update');
//    Route::delete('/goal/{goal}', [GoalController::class, 'destroy'])->name('goal.destroy');

    //Рахунки
    Route::post('/accounts', [AccountController::class, 'create'])->name('accounts.create');

    // Вихід (не забудьте додати метод logout у контролер)
    Route::get('/logout', [SignInController::class, 'logout'])->name('logout');
});

Route::get('/mainpage', [MainPageController::class, 'index'])->name('pages.mainpage');
