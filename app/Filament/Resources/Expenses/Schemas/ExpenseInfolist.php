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
                TextEntry::make('title')
                    ->label('عنوان'),
                TextEntry::make('branch.name')
                    ->label('شعبه'),
                TextEntry::make('category')
                    ->label('دسته‌بندی'),
                TextEntry::make('amount')
                    ->label('مبلغ')
                    ->numeric(),
                TextEntry::make('expense_date')
                    ->label('تاریخ')
                    ->date(),
                TextEntry::make('description')
                    ->label('توضیحات')
                    ->placeholder('-')
                    ->columnSpanFull(),
            ]);
    }
}
