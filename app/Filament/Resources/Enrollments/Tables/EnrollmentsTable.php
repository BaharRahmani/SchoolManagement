<?php

namespace App\Filament\Resources\Enrollments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EnrollmentsTable
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

                TextColumn::make('academicYear.name')
                    ->label('سال تعلیمی')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('branch.name')
                    ->label('شعبه')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('roll_number')
                    ->label('شماره رول')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('enrollment_date')
                    ->label('تاریخ ثبت‌نام')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('وضعیت')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'active' => 'فعال',
                        'completed' => 'تکمیل شده',
                        'transferred' => 'انتقال شده',
                        'cancelled' => 'لغو شده',
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