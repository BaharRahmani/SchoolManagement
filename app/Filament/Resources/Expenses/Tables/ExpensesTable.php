<?php

namespace App\Filament\Resources\Expenses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExpensesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('branch.name')
                    ->label('شعبه')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->label('دسته‌بندی')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'rent' => 'کرایه',
                        'electricity' => 'برق',
                        'water' => 'آب',
                        'internet' => 'انترنت',
                        'stationery' => 'لوازم‌التحریر',
                        'maintenance' => 'ترمیمات',
                        'transport' => 'ترانسپورت',
                        'salary' => 'معاش',
                        'other' => 'سایر',
                        default => $state,
                    })
                    ->sortable(),

                TextColumn::make('amount')
                    ->label('مبلغ')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('expense_date')
                    ->label('تاریخ مصرف')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('paid_to')
                    ->label('پرداخت به')
                    ->searchable(),

                TextColumn::make('created_by')
                    ->label('ثبت کننده')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('تاریخ ثبت')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])

            ->filters([])

            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}