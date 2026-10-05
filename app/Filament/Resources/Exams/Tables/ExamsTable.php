<?php

namespace App\Filament\Resources\Exams\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExamsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->label('نام امتحان')
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

                TextColumn::make('schoolClass.name')
                    ->label('صنف')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('exam_type')
                    ->label('نوع امتحان')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'monthly' => 'ماهانه',
                        'midterm' => 'چهارونیم ماهه',
                        'final' => 'سالانه',
                        'quiz' => 'کوییز',
                        'other' => 'سایر',
                        default => $state,
                    })
                    ->sortable(),

                TextColumn::make('start_date')
                    ->label('تاریخ شروع')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('end_date')
                    ->label('تاریخ ختم')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('وضعیت')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'planned' => 'برنامه‌ریزی شده',
                        'active' => 'در حال برگزاری',
                        'completed' => 'تکمیل شده',
                        'cancelled' => 'لغو شده',
                        default => $state,
                    })
                    ->sortable(),

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