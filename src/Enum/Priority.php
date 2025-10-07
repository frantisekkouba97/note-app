<?php

namespace App\Enum;

enum Priority: string
{
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';

    public function label(): string
    {
        return match ($this) {
            self::LOW => 'Nízká',
            self::MEDIUM => 'Střední',
            self::HIGH => 'Vysoká',
        };
    }

    /**
     * @return array<string, self>
     */
    public static function choices(): array
    {
        return [
            self::LOW->label() => self::LOW,
            self::MEDIUM->label() => self::MEDIUM,
            self::HIGH->label() => self::HIGH,
        ];
    }
}
