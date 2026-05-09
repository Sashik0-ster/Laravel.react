<?php

namespace App\Models\Finance;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IncomeSource extends Model
{
    use HasFactory;

    // Вказуємо назву первинного ключа відповідно до вашої структури
    protected $primaryKey = 'source_id';

    protected $fillable = [
        'user_id',
        'name',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incomes()
    {
        return $this->hasMany(Income::class, 'income_source_id');
    }
}
