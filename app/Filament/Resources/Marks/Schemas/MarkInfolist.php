<?php

namespace App\Filament\Resources\Marks\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MarkInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('exam.name')
                    ->label('امتحان'),
                TextEntry::make('student.first_name')
                    ->label('شاگرد'),
                TextEntry::make('subject.name')
                    ->label('مضمون'),
                TextEntry::make('written_marks')
                    ->label('تحریری')
                    ->numeric(),
                TextEntry::make('activity_marks')
                    ->label('فعالیت')
                    ->numeric(),
                TextEntry::make('homework_marks')
                    ->label('کار خانگی')
                    ->numeric(),
                TextEntry::make('total_marks')
                    ->label('مجموع')
                    ->numeric(),
                IconEntry::make('is_passed')
                    ->label('کامیاب')
                    ->boolean(),
            ]);
    }
}
