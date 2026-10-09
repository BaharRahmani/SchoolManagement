<?php

namespace App\Filament\Resources\FeePayments\Schemas;

use App\Enums\PaymentMethod;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FeePaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('student_fee_id')
                    ->relationship('studentFee', 'id')
                    ->required(),
                TextInput::make('receipt_no')
                    ->required(),
                TextInput::make('amount_paid')
                    ->required()
                    ->numeric(),
                DatePicker::make('payment_date')
                    ->required(),
                Select::make('payment_method')
                    ->options(PaymentMethod::class)
                    ->required(),
                Textarea::make('note')
                    ->columnSpanFull(),
            ]);
    }
}
