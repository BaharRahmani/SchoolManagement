<?php

namespace App\Enums;

enum PromotionStatus: string
{
    case Active = 'active';
    case Graduated = 'graduated';
    case Dropped = 'dropped';
    case Transferred = 'transferred';

    public function label(): string
    {
        return match ($this) {
            self::Active => 'فعال',
            self::Graduated => 'فارغ',
            self::Dropped => 'منفک',
            self::Transferred => 'منتقل شده',
        };
    }
}
