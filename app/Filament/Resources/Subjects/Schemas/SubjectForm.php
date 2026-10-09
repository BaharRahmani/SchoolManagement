<?php

namespace App\Filament\Resources\Subjects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SubjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('نام مضمون')
                    ->placeholder('مثلاً ریاضی')
                    ->required()
                    ->maxLength(255),

                TextInput::make('code')
                    ->label('کد مضمون')
                    ->placeholder('مثلاً MATH-01')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(50),
            ]);
    }
}
