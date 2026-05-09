<?php

namespace App\Models\Finance;


use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'currency_name',
        'symbol',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function incomes()
    {
        return $this->hasMany(Income::class, 'currency_id');
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'currency_id');
    }

    public function accounts()
    {
        return $this->hasMany(Account::class, 'currency_id');
    }

    public function goals()
    {
        return $this->hasMany(Goal::class, 'currency_id');
    }

    public function savings()
    {
        return $this->hasMany(Saving::class, 'currency_id');
    }

}
