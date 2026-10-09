<?php

namespace App\Filament\Resources\Branches\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BranchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('اطلاعات شعبه')
                    ->description('معلومات اصلی شعبه مکتب را وارد کنید.')
                    ->schema([

                        TextInput::make('name')
                            ->label('نام شعبه')
                            ->placeholder('مثلاً شعبه مرکزی')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('code')
                            ->label('کد شعبه')
                            ->placeholder('مثلاً BR-001')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(50),

                        TextInput::make('phone')
                            ->label('شماره تماس')
                            ->tel()
                            ->maxLength(20)
                            ->nullable(),

                    ])
                    ->columns(2),

                Section::make('آدرس شعبه')
                    ->schema([

                        Textarea::make('address')
                            ->label('آدرس')
                            ->placeholder('آدرس کامل شعبه را وارد کنید...')
                            ->rows(3)
                            ->columnSpanFull(),

                    ]),

                Section::make('وضعیت شعبه')
                    ->schema([

                        Toggle::make('is_active')
                            ->label('شعبه فعال است')
                            ->default(true)
                            ->onColor('success')
                            ->offColor('danger'),

                    ]),

            ]);
    }
}
