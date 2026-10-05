<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StudentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('branch.name')
                    ->label('Branch'),
                TextEntry::make('student_parent_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('student_code'),
                TextEntry::make('name'),
                TextEntry::make('father_name'),
                TextEntry::make('grandfather_name')
                    ->placeholder('-'),
                TextEntry::make('gender')
                    ->badge(),
                TextEntry::make('date_of_birth')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('phone')
                    ->placeholder('-'),
                TextEntry::make('address')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('photo')
                    ->placeholder('-'),
                TextEntry::make('admission_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('description')
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
