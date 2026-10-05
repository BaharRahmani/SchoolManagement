<?php

namespace App\Filament\Resources\TeacherAttendances\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TeacherAttendanceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('teacher.name')
                    ->label('Teacher'),
                TextEntry::make('branch.name')
                    ->label('Branch'),
                TextEntry::make('date')
                    ->date(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('check_in')
                    ->time()
                    ->placeholder('-'),
                TextEntry::make('check_out')
                    ->time()
                    ->placeholder('-'),
                TextEntry::make('note')
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
