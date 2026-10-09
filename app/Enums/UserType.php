<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum UserType: string implements HasLabel
{
    case SuperAdmin = 'super_admin';
    case BranchManager = 'branch_manager';
    case Accountant = 'accountant';
    case Teacher = 'teacher';
    case Registrar = 'registrar';

    public function getLabel(): string
    {
        return $this->label();
    }

    public function label(): string
    {
        return match ($this) {
            self::SuperAdmin => 'مدیر کل',
            self::BranchManager => 'مدیر شعبه',
            self::Accountant => 'حسابدار',
            self::Teacher => 'معلم',
            self::Registrar => 'ثبت‌نام',
        };
    }
}
