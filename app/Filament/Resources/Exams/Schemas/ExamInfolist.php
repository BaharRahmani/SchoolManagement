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
                TextEntry::make('name')
                    ->label('نام امتحان'),
                TextEntry::make('academicYear.year_name')
                    ->label('سال تعلیمی'),
                TextEntry::make('term')
                    ->label('دوره')
                    ->badge(),
            ]);
    }
}
