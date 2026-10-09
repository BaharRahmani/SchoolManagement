<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TeacherInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('first_name')
                    ->label('نام'),
                TextEntry::make('last_name')
                    ->label('تخلص'),
                TextEntry::make('branch.name')
                    ->label('شعبه'),
                TextEntry::make('phone')
                    ->label('شماره تماس'),
                TextEntry::make('qualification')
                    ->label('تحصیلات'),
                TextEntry::make('base_salary')
                    ->label('معاش')
                    ->numeric(),
                TextEntry::make('hire_date')
                    ->label('تاریخ استخدام')
                    ->date(),
                IconEntry::make('is_active')
                    ->label('فعال')
                    ->boolean(),
            ]);
    }
}
