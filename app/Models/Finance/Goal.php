<?php

namespace App\Models\Finance;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $primaryKey = 'goal_id';

    protected $fillable = [
        'user_id',
        'goal_name',
        'target_amount',
        'current_amount',
        'currency_id',
        'deadline',
        'priority',
        'status',
    ];

    protected $casts = [
        'target_amount' => 'decimal:2',
        'current_amount' => 'decimal:2',
        'deadline' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    /**
     * Додатковий метод для отримання відсотка виконання цілі.
     */
    public function getProgressPercentageAttribute()
    {
        if ($this->target_amount <= 0) return 0;
        return round(($this->current_amount / $this->target_amount) * 100, 2);
    }
}
