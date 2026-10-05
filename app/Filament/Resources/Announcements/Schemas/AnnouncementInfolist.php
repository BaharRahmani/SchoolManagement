<?php

namespace App\Filament\Resources\Announcements\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AnnouncementInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('branch.name')
                    ->label('Branch')
                    ->placeholder('-'),
                TextEntry::make('title'),
                TextEntry::make('content')
                    ->columnSpanFull(),
                TextEntry::make('publish_date')
                    ->date(),
                TextEntry::make('expire_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('target')
                    ->badge(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('created_by')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
