<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TeacherInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('branch.name')
                    ->label('Branch'),
                TextEntry::make('teacher_code'),
                TextEntry::make('name'),
                TextEntry::make('father_name')
                    ->placeholder('-'),
                TextEntry::make('gender')
                    ->badge()
                    ->placeholder('-'),
                TextEntry::make('phone'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('address')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('qualification')
                    ->placeholder('-'),
                TextEntry::make('specialization')
                    ->placeholder('-'),
                TextEntry::make('hire_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('salary')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('photo')
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
