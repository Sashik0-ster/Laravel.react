<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Models\User;

class Account extends Model
{
    use HasFactory;

    protected $primaryKey = 'account_id';

    protected $fillable = ['user_id', 'name', 'balance', 'currency_id', 'type'];

    protected $casts = [
        'balance' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'currency_id');
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
