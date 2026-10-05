<?php

namespace App\Filament\Resources\StudentParents\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StudentParentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('phone'),
                TextEntry::make('second_phone')
                    ->placeholder('-'),
                TextEntry::make('relationship')
                    ->placeholder('-'),
                TextEntry::make('occupation')
                    ->placeholder('-'),
                TextEntry::make('address')
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
