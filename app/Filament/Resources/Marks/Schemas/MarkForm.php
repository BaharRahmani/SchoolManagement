<?php

namespace App\Filament\Resources\Marks\Schemas;

use App\Models\Exam;
use App\Models\Student;
use App\Models\Subject;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MarkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('exam_id')
                    ->label('امتحان')
                    ->options(Exam::query()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('student_id')
                    ->label('شاگرد')
                    ->options(Student::query()->pluck('first_name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('subject_id')
                    ->label('مضمون')
                    ->options(Subject::query()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('written_marks')
                    ->label('نمره تحریری')
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->required(),
                TextInput::make('activity_marks')
                    ->label('نمره فعالیت')
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->required(),
                TextInput::make('homework_marks')
                    ->label('نمره کار خانگی')
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->required(),
                Toggle::make('is_passed')
                    ->label('کامیاب')
                    ->default(false),
            ]);
    }
}
