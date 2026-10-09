<?php

namespace App\Filament\Resources\AcademicYears\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AcademicYearInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('year_name')
                    ->label('سال تعلیمی'),
                TextEntry::make('start_date')
                    ->label('تاریخ شروع')
                    ->date(),
                TextEntry::make('end_date')
                    ->label('تاریخ ختم')
                    ->date(),
                IconEntry::make('is_active')
                    ->label('فعال')
                    ->boolean(),
            ]);
    }
}
