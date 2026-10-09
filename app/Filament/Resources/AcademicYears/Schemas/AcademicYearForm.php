<?php

namespace App\Filament\Resources\AcademicYears\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AcademicYearForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('year_name')
                    ->label('نام سال تعلیمی')
                    ->placeholder('مثلاً ۱۴۰۵ - ۱۴۰۶')
                    ->required()
                    ->maxLength(255),

                DatePicker::make('start_date')
                    ->label('تاریخ شروع')
                    ->required()
                    ->native(false),

                DatePicker::make('end_date')
                    ->label('تاریخ ختم')
                    ->required()
                    ->native(false),

                Toggle::make('is_active')
                    ->label('سال تعلیمی فعال')
                    ->default(true),
            ]);
    }
}
