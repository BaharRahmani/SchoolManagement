<?php

namespace App\Filament\Resources\Schedules\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SchedulesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('branch.name')
                    ->label('شعبه')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('schoolClass.name')
                    ->label('صنف')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('teacher.name')
                    ->label('استاد')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('subject.name')
                    ->label('مضمون')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('day')
                    ->label('روز')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'saturday' => 'شنبه',
                        'sunday' => 'یکشنبه',
                        'monday' => 'دوشنبه',
                        'tuesday' => 'سه‌شنبه',
                        'wednesday' => 'چهارشنبه',
                        'thursday' => 'پنجشنبه',
                        default => $state,
                    })
                    ->sortable(),

                TextColumn::make('start_time')
                    ->label('شروع'),

                TextColumn::make('end_time')
                    ->label('ختم'),

                TextColumn::make('room')
                    ->label('اتاق / صنف')
                    ->toggleable(),

                IconColumn::make('is_active')
                    ->label('وضعیت')
                    ->boolean(),

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