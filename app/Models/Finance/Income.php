<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Income extends Model
{
    use HasFactory;

    protected $primaryKey = 'income_id';

    protected $fillable = [
        'user_id',
        'account_id',
        'amount',
        'currency_id',
        'income_source_id',
        'description',
        'is_recurring',
        'income_date',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'income_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        // belongsTo(Клас, 'зовнішній_ключ_в_цій_таблиці', 'ключ_в_таблиці_accounts')
        return $this->belongsTo(Account::class, 'account_id', 'account_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'currency_id');
    }

    public function source()
    {
        return $this->belongsTo(IncomeSource::class, 'income_source_id');
    }

    public function getRecurringStatusAttribute(): string
    {
        return $this->is_recurring ? 'Регулярний' : 'Одноразовий';
    }

}
