<?php

namespace App\Filament\Resources\SchoolClasses\Schemas;

use App\Models\AcademicYear;
use App\Models\Branch;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SchoolClassForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('نام صنف')
                    ->required()
                    ->maxLength(255),

                TextInput::make('grade')
                    ->label('صنف / پایه')
                    ->required()
                    ->maxLength(50),

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

                Select::make('academic_year_id')
                    ->label('سال تعلیمی')
                    ->options(
                        AcademicYear::query()
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('capacity')
                    ->label('ظرفیت صنف')
                    ->numeric()
                    ->minValue(1),

                Toggle::make('is_active')
                    ->label('صنف فعال')
                    ->default(true),
            ]);
    }
}