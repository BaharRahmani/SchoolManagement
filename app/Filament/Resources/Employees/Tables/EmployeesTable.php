<?php

namespace App\Filament\Resources\Employees\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmployeesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('نام کارمند')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('father_name')
                    ->label('نام پدر')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('شماره تماس')
                    ->searchable(),

                TextColumn::make('position')
                    ->label('وظیفه / بست')
                    ->searchable(),

                TextColumn::make('employee_code')
                    ->label('کد کارمند')
                    ->searchable(),

                TextColumn::make('salary')
                    ->label('معاش')
                    ->numeric()
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('وضعیت')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('تاریخ ثبت')
                    ->dateTime('Y-m-d')
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