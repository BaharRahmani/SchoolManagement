<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ExamTerm: string implements HasLabel
{
    case MidTerm = 'mid_term';
    case Final = 'final';
    case Monthly = 'monthly';

    public function getLabel(): string
    {
        return $this->label();
    }

    public function label(): string
    {
        return match ($this) {
            self::MidTerm => 'امتحانات چهارونیم ماهه',
            self::Final => 'امتحانات سالانه',
            self::Monthly => 'امتحانات ماهانه',
        };
    }
}
