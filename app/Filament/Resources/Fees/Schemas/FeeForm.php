<?php

namespace App\Filament\Resources\Fees\Schemas;

use App\Models\Student;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class FeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('student_id')
                    ->label('شاگرد')
                    ->options(
                        Student::query()
                            ->orderBy('name')
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('amount')
                    ->label('مبلغ فیس')
                    ->numeric()
                    ->required()
                    ->minValue(0),

                DatePicker::make('due_date')
                    ->label('تاریخ پرداخت')
                    ->native(false),

                Select::make('status')
                    ->label('وضعیت')
                    ->options([
                        'unpaid' => 'پرداخت نشده',
                        'partial' => 'قسمتی پرداخت شده',
                        'paid' => 'پرداخت شده',
                    ])
                    ->default('unpaid')
                    ->required(),

                Textarea::make('description')
                    ->label('توضیحات')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}