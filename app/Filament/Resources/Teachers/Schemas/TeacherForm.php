<?php

namespace App\Filament\Resources\Teachers\Schemas;

use App\Models\Branch;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('branch_id')
                    ->label('شعبه')
                    ->options(Branch::query()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('user_id')
                    ->label('حساب کاربری')
                    ->options(User::query()->pluck('name', 'id'))
                    ->searchable(),
                TextInput::make('first_name')
                    ->label('نام')
                    ->required()
                    ->maxLength(255),
                TextInput::make('last_name')
                    ->label('تخلص')
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('شماره تماس')
                    ->tel()
                    ->required()
                    ->maxLength(20),
                TextInput::make('qualification')
                    ->label('تحصیلات')
                    ->required()
                    ->maxLength(255),
                TextInput::make('base_salary')
                    ->label('معاش اساسی')
                    ->numeric()
                    ->required()
                    ->minValue(0),
                DatePicker::make('hire_date')
                    ->label('تاریخ استخدام')
                    ->required()
                    ->native(false),
                Toggle::make('is_active')
                    ->label('فعال')
                    ->default(true),
            ]);
    }
}
