<?php

namespace App\Filament\Resources\Students\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('admission_no')
                    ->label('شماره ثبت')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('first_name')
                    ->label('نام')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('last_name')
                    ->label('تخلص')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('father_name')
                    ->label('نام پدر')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('gender')
                    ->label('جنسیت')
                    ->badge(),

                TextColumn::make('branch.name')
                    ->label('شعبه')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('guardian.name')
                    ->label('والد / سرپرست')
                    ->searchable(),

                TextColumn::make('is_active')
                    ->label('وضعیت')
                    ->badge()
                    ->formatStateUsing(fn (bool $state): string => $state ? 'فعال' : 'غیرفعال'),

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
