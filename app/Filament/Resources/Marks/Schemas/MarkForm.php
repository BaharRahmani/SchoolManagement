<?php

namespace App\Filament\Resources\Marks\Schemas;

use App\Models\Exam;
use App\Models\Student;
use App\Models\Subject;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MarkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('exam_id')
                    ->label('امتحان')
                    ->options(
                        Exam::query()
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('student_id')
                    ->label('شاگرد')
                    ->options(
                        Student::query()
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('subject_id')
                    ->label('مضمون')
                    ->options(
                        Subject::query()
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('marks')
                    ->label('نمره')
                    ->numeric()
                    ->minValue(0)
                    ->required(),

                TextInput::make('total_marks')
                    ->label('مجموع نمرات')
                    ->numeric()
                    ->minValue(1)
                    ->default(100)
                    ->required(),

                TextInput::make('grade')
                    ->label('درجه / گرید')
                    ->placeholder('مثلاً A یا B')
                    ->maxLength(50),

                Textarea::make('remark')
                    ->label('توضیحات')
                    ->rows(3)
                    ->columnSpanFull(),

            ]);
    }
}