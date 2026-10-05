<?php

namespace App\Filament\Resources\AcademicYears\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;

class AcademicYearsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('سال تعلیمی')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('start_date')
                    ->label('تاریخ شروع')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('end_date')
                    ->label('تاریخ ختم')
                    ->date('Y-m-d')
                    ->sortable(),

                IconColumn::make('status')
                    ->label('وضعیت')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('ایجاد شده')
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