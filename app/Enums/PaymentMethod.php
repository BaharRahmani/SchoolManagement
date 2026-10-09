<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PaymentMethod: string implements HasLabel
{
    case Cash = 'cash';
    case Bank = 'bank';
    case Online = 'online';

    public function getLabel(): string
    {
        return $this->label();
    }

    public function label(): string
    {
        return match ($this) {
            self::Cash => 'نقد',
            self::Bank => 'بانک',
            self::Online => 'آنلاین',
        };
    }
}
