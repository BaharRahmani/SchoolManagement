<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('student_id')
                    ->relationship('student', 'name')
                    ->required(),
                Select::make('fee_id')
                    ->relationship('fee', 'id')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                DatePicker::make('payment_date')
                    ->required(),
                Select::make('payment_method')
                    ->options(['cash' => 'Cash', 'bank' => 'Bank', 'online' => 'Online'])
                    ->default('cash')
                    ->required(),
                TextInput::make('receipt_number')
                    ->required(),
                TextInput::make('received_by')
                    ->default(null),
                Textarea::make('note')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
