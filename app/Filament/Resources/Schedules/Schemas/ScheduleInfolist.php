<?php

namespace App\Filament\Resources\Schedules\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ScheduleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('branch.name')
                    ->label('Branch'),
                TextEntry::make('class_id')
                    ->numeric(),
                TextEntry::make('teacher.name')
                    ->label('Teacher'),
                TextEntry::make('subject.name')
                    ->label('Subject'),
                TextEntry::make('day')
                    ->badge(),
                TextEntry::make('start_time')
                    ->time(),
                TextEntry::make('end_time')
                    ->time(),
                TextEntry::make('room')
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
