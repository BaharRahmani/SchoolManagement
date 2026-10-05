<?php

namespace App\Filament\Resources\Marks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MarkInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('exam.name')
                    ->label('Exam'),
                TextEntry::make('student.name')
                    ->label('Student'),
                TextEntry::make('subject.name')
                    ->label('Subject'),
                TextEntry::make('marks')
                    ->numeric(),
                TextEntry::make('total_marks')
                    ->numeric(),
                TextEntry::make('grade')
                    ->placeholder('-'),
                TextEntry::make('remark')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
