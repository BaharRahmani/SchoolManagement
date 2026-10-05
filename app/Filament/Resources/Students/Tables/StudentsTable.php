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

                TextColumn::make('student_code')
                    ->label('کد شاگرد')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('نام شاگرد')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('father_name')
                    ->label('نام پدر')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('gender')
                    ->label('جنسیت')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'male' => 'ذکور',
                        'female' => 'اناث',
                        default => $state,
                    }),

                TextColumn::make('branch.name')
                    ->label('شعبه')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('parent.name')
                    ->label('والد / سرپرست')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('شماره تماس')
                    ->searchable(),

                TextColumn::make('status')
                    ->label('وضعیت')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'active' => 'فعال',
                        'inactive' => 'غیرفعال',
                        'graduated' => 'فارغ‌التحصیل',
                        'left' => 'ترک تحصیل',
                        default => $state,
                    }),

                TextColumn::make('admission_date')
                    ->label('تاریخ ثبت‌نام')
                    ->date('Y-m-d')
                    ->sortable(),

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