<?php

namespace App\Filament\Resources\StudentParents\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StudentParentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('نام والد / سرپرست')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone')
                    ->label('شماره تماس')
                    ->searchable(),

                TextColumn::make('second_phone')
                    ->label('شماره دوم')
                    ->toggleable(),

                TextColumn::make('relationship')
                    ->label('نسبت')
                    ->searchable(),

                TextColumn::make('occupation')
                    ->label('وظیفه / شغل')
                    ->searchable(),

                TextColumn::make('address')
                    ->label('آدرس')
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