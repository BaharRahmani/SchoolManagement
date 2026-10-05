<?php

namespace App\Filament\Resources\Exams\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ExamInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('academicYear.name')
                    ->label('Academic year'),
                TextEntry::make('branch.name')
                    ->label('Branch'),
                TextEntry::make('class_id')
                    ->numeric(),
                TextEntry::make('name'),
                TextEntry::make('exam_type')
                    ->badge(),
                TextEntry::make('start_date')
                    ->date(),
                TextEntry::make('end_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
