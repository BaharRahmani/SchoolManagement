<?php

namespace App\Filament\Resources\Expenses\Schemas;

use App\Models\Branch;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExpenseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('title')
                    ->label('عنوان')
                    ->required()
                    ->maxLength(255),

                Select::make('branch_id')
                    ->label('شعبه')
                    ->options(
                        Branch::query()
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('category')
                    ->label('دسته‌بندی مصرف')
                    ->options([
                        'rent' => 'کرایه',
                        'electricity' => 'برق',
                        'water' => 'آب',
                        'internet' => 'انترنت',
                        'stationery' => 'لوازم‌التحریر',
                        'maintenance' => 'ترمیمات',
                        'transport' => 'ترانسپورت',
                        'salary' => 'معاش',
                        'other' => 'سایر',
                    ])
                    ->searchable()
                    ->required(),

                TextInput::make('amount')
                    ->label('مبلغ')
                    ->numeric()
                    ->minValue(0)
                    ->required(),

                DatePicker::make('expense_date')
                    ->label('تاریخ مصرف')
                    ->native(false)
                    ->default(now())
                    ->required(),

                Textarea::make('description')
                    ->label('توضیحات')
                    ->rows(4)
                    ->columnSpanFull(),

            ]);
    }
}
