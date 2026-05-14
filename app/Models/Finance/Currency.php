<?php

namespace App\Models\Finance;


use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $primaryKey = 'currency_id';

    protected $fillable = [
        'currency_name',
        'code',
        'symbol',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getCodeColor($code): string
    {
        $colors = [
            'PLN' => '#FFB347',
            'USD' => '#4FFFA4',
            'EUR' => '#7B8CFF',
            'UAH' => '#7B8CFF',


        ];

            return $colors[$code] ?? 'gray';
    }

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
