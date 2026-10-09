<?php

namespace App\Filament\Resources\Guardians\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GuardianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('father_name')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('alt_phone')
                    ->tel(),
                TextInput::make('job'),
                Textarea::make('address')
                    ->columnSpanFull(),
                TextInput::make('national_id_no'),
            ]);
    }
}
