<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Income extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'account_id',
        'amount',
        'currency_id',
        'income_source_id',
        'description',
        'is_recurring',
        'income_date',
        /*'name',
        'price',
        'category',
        'description',
        'discount',*/
    ];

/*    protected $casts = [
        'amount' => 'decimal:2',
        'is_recurring' => 'boolean',
        'income_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];*/

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function source()
    {
        return $this->belongsTo(IncomeSource::class, 'income_source_id');
    }
}
