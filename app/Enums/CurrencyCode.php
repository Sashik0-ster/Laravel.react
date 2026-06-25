<?php

namespace App\Enums;

enum CurrencyCode: string
{
    case PLN = 'PLN';
    case USD = 'USD';
    case EUR = 'EUR';
    case UAH = 'UAH';

    public function getCodeColor(): string
    {
        return match ($this) {
            self::PLN => '#FFB347',
            self::USD => '#4FFFA4',
            self::EUR => '#7B8CFF',
            self::UAH => '#FFD700',
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::PLN => 'Польський злотий',
            self::USD => 'Долар США',
            self::EUR => 'Євро',
            self::UAH => 'Українська гривня',
        };
    }

    public function symbol(): string
    {
        return match ($this) {
            self::PLN => 'zł',
            self::USD => '$',
            self::EUR => '€',
            self::UAH => '₴',
        };
    }
}
