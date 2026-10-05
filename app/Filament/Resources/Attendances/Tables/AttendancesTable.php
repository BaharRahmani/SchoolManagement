<?php

namespace App\Filament\Resources\Attendances\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AttendancesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('student.name')
                    ->label('شاگرد')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('schoolClass.name')
                    ->label('صنف')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('date')
                    ->label('تاریخ')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('وضعیت')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'present' => 'حاضر',
                        'absent' => 'غایب',
                        'late' => 'دیر آمده',
                        'leave' => 'رخصت',
                        default => $state,
                    }),

                TextColumn::make('check_in')
                    ->label('وقت ورود'),

                TextColumn::make('check_out')
                    ->label('وقت خروج'),

                TextColumn::make('note')
                    ->label('یادداشت')
                    ->limit(40)
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('تاریخ ثبت')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([
                //
            ])

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