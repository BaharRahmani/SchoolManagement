<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StudentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('admission_no')
                    ->label('شماره ثبت'),
                TextEntry::make('first_name')
                    ->label('نام'),
                TextEntry::make('last_name')
                    ->label('تخلص'),
                TextEntry::make('father_name')
                    ->label('نام پدر'),
                TextEntry::make('branch.name')
                    ->label('شعبه'),
                TextEntry::make('guardian.name')
                    ->label('ولی'),
                TextEntry::make('gender')
                    ->label('جنسیت')
                    ->badge(),
                TextEntry::make('dob')
                    ->label('تاریخ تولد')
                    ->date()
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->label('فعال')
                    ->boolean(),
            ]);
    }
}
