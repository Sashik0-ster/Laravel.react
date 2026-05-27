<?php

namespace App\Models\Finance;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Saving extends Model
{

    use HasFactory;

    protected $primaryKey = 'saving_id';


    protected $fillable = [
        'user_id',
        'amount',
        'currency_id',
        'saving_type',
        'saving_date',
        'description',
        'interest_rate',
        'maturity_date',
    ];

    protected $casts = [
        'saving_date' => 'date',
        'maturity_date' => 'date',
        'amount' => 'decimal:2',
        'interest_rate' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'currency_id');
    }
}
