<?php

namespace App\Filament\Resources\StudentFees\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentFeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('student_id')
                    ->label('شاگرد')
                    ->relationship('student', 'first_name')
                    ->required(),
                Select::make('academic_year_id')
                    ->label('سال تعلیمی')
                    ->relationship('academicYear', 'year_name')
                    ->required(),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric(),
                TextInput::make('discount')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('net_amount')
                    ->required()
                    ->numeric(),
                DatePicker::make('due_date')
                    ->required(),
            ]);
    }
}
