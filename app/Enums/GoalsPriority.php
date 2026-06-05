<?php

namespace App\Enums;

enum GoalsPriority: string
{
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';

    public function color(): string
    {
        return match($this) {
            self::LOW => 'bg-blue-900 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
            self::MEDIUM => 'bg-amber-900 text-amber-800 dark:bg-amber-900 dark:text-amber-300',
            self::HIGH => 'bg-red-900 text-red-800 dark:bg-red-900 dark:text-red-300',
        };
    }

    public function label(): string
    {
        return match($this) {
            self::LOW => 'Низький',
            self::MEDIUM => 'Середній',
            self::HIGH => 'Високий',
        };
    }
}
