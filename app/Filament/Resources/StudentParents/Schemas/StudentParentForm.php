<?php

namespace App\Filament\Resources\StudentParents\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class StudentParentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('نام والد / سرپرست')
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label('شماره تماس')
                    ->tel()
                    ->required()
                    ->maxLength(20),

                TextInput::make('second_phone')
                    ->label('شماره تماس دوم')
                    ->tel()
                    ->maxLength(20),

                TextInput::make('relationship')
                    ->label('نسبت با شاگرد')
                    ->placeholder('مثلاً پدر، مادر، برادر، سرپرست')
                    ->maxLength(100),

                TextInput::make('occupation')
                    ->label('وظیفه / شغل')
                    ->maxLength(255),

                Textarea::make('address')
                    ->label('آدرس')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}