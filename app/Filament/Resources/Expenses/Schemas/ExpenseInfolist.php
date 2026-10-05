<?php

namespace App\Filament\Resources\Expenses\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ExpenseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('branch.name')
                    ->label('Branch'),
                TextEntry::make('category'),
                TextEntry::make('amount')
                    ->numeric(),
                TextEntry::make('expense_date')
                    ->date(),
                TextEntry::make('paid_to')
                    ->placeholder('-'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_by')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
