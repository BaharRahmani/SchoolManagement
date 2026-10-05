<?php

namespace App\Filament\Resources\Fees\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class FeesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.name')
                    ->label('شاگرد')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('amount')
                    ->label('مبلغ')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('due_date')
                    ->label('تاریخ پرداخت')
                    ->date('Y/m/d')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('وضعیت')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'paid' => 'پرداخت شده',
                        'partial' => 'قسمتی پرداخت شده',
                        'unpaid' => 'پرداخت نشده',
                        default => $state,
                    })
                    ->color(fn ($state) => match ($state) {
                        'paid' => 'success',
                        'partial' => 'warning',
                        'unpaid' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('تاریخ ثبت')
                    ->dateTime('Y/m/d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([
                SelectFilter::make('status')
                    ->label('وضعیت')
                    ->options([
                        'paid' => 'پرداخت شده',
                        'partial' => 'قسمتی پرداخت شده',
                        'unpaid' => 'پرداخت نشده',
                    ]),
            ])

            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}