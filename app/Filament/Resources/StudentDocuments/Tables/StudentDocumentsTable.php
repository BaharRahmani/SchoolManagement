<?php

namespace App\Filament\Resources\StudentDocuments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StudentDocumentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('student.name')
                    ->label('شاگرد')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('document_type')
                    ->label('نوع سند')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'identity' => 'تذکره',
                        'birth_certificate' => 'تولدنامه',
                        'previous_certificate' => 'سند تحصیلی قبلی',
                        'photo' => 'عکس',
                        'transfer' => 'تبدیلی',
                        'certificate' => 'تصدیق‌نامه',
                        'other' => 'سایر',
                        default => $state,
                    })
                    ->sortable(),

                TextColumn::make('file')
                    ->label('فایل')
                    ->limit(40),

                TextColumn::make('description')
                    ->label('توضیحات')
                    ->limit(50)
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('تاریخ ثبت')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),

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