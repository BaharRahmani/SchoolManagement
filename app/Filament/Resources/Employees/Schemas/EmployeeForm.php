<?php

namespace App\Filament\Resources\Employees\Schemas;

use App\Models\Branch;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('branch_id')
                    ->label('شعبه')
                    ->options(Branch::pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                TextInput::make('name')
                    ->label('نام کارمند')
                    ->required()
                    ->maxLength(255),

                TextInput::make('father_name')
                    ->label('نام پدر')
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label('شماره تماس')
                    ->tel()
                    ->maxLength(20),

                TextInput::make('position')
                    ->label('وظیفه / سمت')
                    ->required()
                    ->maxLength(255),

                TextInput::make('salary')
                    ->label('معاش')
                    ->numeric()
                    ->default(0)
                    ->required(),

                DatePicker::make('hire_date')
                    ->label('تاریخ استخدام'),

                Textarea::make('address')
                    ->label('آدرس')
                    ->rows(3),

                Toggle::make('is_active')
                    ->label('کارمند فعال')
                    ->default(true),
            ]);
    }
}