<?php

namespace App\Filament\Resources\Students\Schemas;

use App\Enums\Gender;
use App\Models\Branch;
use App\Models\Guardian;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('branch_id')
                    ->label('شعبه')
                    ->options(
                        Branch::query()
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('guardian_id')
                    ->label('والد / سرپرست')
                    ->options(
                        Guardian::query()
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('admission_no')
                    ->label('شماره ثبت')
                    ->placeholder('مثلاً 1405-001')
                    ->required()
                    ->maxLength(50),

                TextInput::make('first_name')
                    ->label('نام')
                    ->required()
                    ->maxLength(255),

                TextInput::make('last_name')
                    ->label('تخلص')
                    ->required()
                    ->maxLength(255),

                TextInput::make('father_name')
                    ->label('نام پدر')
                    ->required()
                    ->maxLength(255),

                TextInput::make('grand_father_name')
                    ->label('نام پدرکلان')
                    ->maxLength(255),

                Select::make('gender')
                    ->label('جنسیت')
                    ->options(Gender::class)
                    ->required(),

                DatePicker::make('dob')
                    ->label('تاریخ تولد')
                    ->native(false),

                Textarea::make('address')
                    ->label('آدرس')
                    ->rows(3)
                    ->columnSpanFull(),

                FileUpload::make('photo')
                    ->label('عکس شاگرد')
                    ->image()
                    ->directory('students')
                    ->imageEditor(),

                Toggle::make('is_active')
                    ->label('شاگرد فعال است')
                    ->default(true),
            ]);
    }
}
