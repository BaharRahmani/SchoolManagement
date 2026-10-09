<?php

namespace App\Filament\Resources\Exams\Schemas;

use App\Enums\ExamTerm;
use App\Models\AcademicYear;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('academic_year_id')
                    ->label('سال تعلیمی')
                    ->options(AcademicYear::query()->pluck('year_name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('name')
                    ->label('نام امتحان')
                    ->placeholder('مثلاً امتحانات چهارونیم ماهه')
                    ->required()
                    ->maxLength(255),
                Select::make('term')
                    ->label('دوره')
                    ->options(ExamTerm::class)
                    ->required(),
            ]);
    }
}
