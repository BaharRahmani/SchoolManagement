<?php

namespace App\Filament\Resources\Teachers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TeachersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('نام استاد')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('teacher_code')
                    ->label('کد استاد')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('branch.name')
                    ->label('شعبه')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('father_name')
                    ->label('نام پدر')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('شماره تماس')
                    ->searchable(),

                TextColumn::make('qualification')
                    ->label('تحصیلات'),

                TextColumn::make('specialization')
                    ->label('تخصص'),

                TextColumn::make('salary')
                    ->label('معاش')
                    ->numeric(),

                TextColumn::make('status')
                    ->label('وضعیت')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'active' => 'فعال',
                        'inactive' => 'غیرفعال',
                        default => $state,
                    }),

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