<?php

namespace App\Filament\Resources\Announcements\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AnnouncementsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('title')
                    ->label('عنوان')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('branch.name')
                    ->label('شعبه')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('target')
                    ->label('مخاطب')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'all' => 'همه',
                        'teachers' => 'استادان',
                        'students' => 'شاگردان',
                        'parents' => 'والدین',
                        'staff' => 'کارمندان',
                        default => $state,
                    })
                    ->sortable(),

                TextColumn::make('publish_date')
                    ->label('تاریخ نشر')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('expire_date')
                    ->label('تاریخ ختم')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('وضعیت')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'draft' => 'پیش‌نویس',
                        'published' => 'منتشر شده',
                        'expired' => 'منقضی شده',
                        default => $state,
                    })
                    ->sortable(),

                TextColumn::make('created_by')
                    ->label('ثبت کننده')
                    ->searchable(),

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