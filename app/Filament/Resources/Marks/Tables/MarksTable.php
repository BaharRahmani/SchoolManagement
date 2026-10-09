<?php

namespace App\Filament\Resources\Marks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MarksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('exam.name')
                    ->label('امتحان')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('student.first_name')
                    ->label('شاگرد')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('subject.name')
                    ->label('مضمون')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('written_marks')
                    ->label('نمره تحریری')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('total_marks')
                    ->label('مجموع')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('is_passed')
                    ->label('نتیجه')
                    ->badge()
                    ->formatStateUsing(fn (bool $state): string => $state ? 'کامیاب' : 'ناکام'),

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
