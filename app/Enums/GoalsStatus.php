<?php

namespace App\Enums;

enum GoalsStatus: string
{
    case ACTIVE = 'active';
    case COMPLETED = 'completed';
    case ARCHIVED = 'archived';

    public function color(): string
    {
        return match($this) {

            self::ACTIVE => 'text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800',
            self::COMPLETED => 'bg-emerald-50 text-emerald-700 border border-emerald-200/60 dark:bg-emerald-950/40 dark:text-emerald-400 dark:border-emerald-800/30 disabled:opacity-60 disabled:cursor-not-allowed',
            self::ARCHIVED => 'bg-gray-100 text-gray-600 border border-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700',
        };
    }

    public function label(): string
    {
        return match($this) {
            self::ACTIVE => 'Редагувати',
            self::COMPLETED => 'Виконано',
            self::ARCHIVED => 'Архівна',
        };
    }

    public function isDisabled(): bool
    {
        return $this !== self::ACTIVE && $this !== self::ARCHIVED;
    }

    public function iconSvgPath(): string
    {
        return match($this) {
            // АКТИВНА: Оригінальна іконка олівця з вашого початкового коду Flowbite (Редагувати)
            self::ACTIVE => '<path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>' .
                '<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>',

            // ВИКОНАНО: Чиста оригінальна іконка галочки успіху (зелена плашка)
            self::COMPLETED => '<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>',

            // АРХІВНА: Іконка замочка (архів/заблоковано), щоб користувач бачив, що редагування недоступне
            self::ARCHIVED => '<path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>',
        };
    }
}
