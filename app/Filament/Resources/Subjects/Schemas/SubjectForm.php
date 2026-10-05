<?php

namespace App\Filament\Resources\Subjects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
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
                    ->unique(ignoreRecord: true)
                    ->maxLength(50),

                Textarea::make('description')
                    ->label('توضیحات')
                    ->placeholder('توضیحات مربوط به مضمون')
                    ->rows(4)
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('مضمون فعال')
                    ->default(true),
            ]);
    }
}