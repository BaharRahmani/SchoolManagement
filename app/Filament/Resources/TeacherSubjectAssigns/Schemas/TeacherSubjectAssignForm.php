<?php

namespace App\Filament\Resources\TeacherSubjectAssigns\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class TeacherSubjectAssignForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('teacher_id')
                    ->label('استاد')
                    ->relationship('teacher', 'first_name')
                    ->required(),
                Select::make('subject_id')
                    ->relationship('subject', 'name')
                    ->required(),
                Select::make('section_id')
                    ->relationship('section', 'name')
                    ->required(),
                Select::make('academic_year_id')
                    ->label('سال تعلیمی')
                    ->relationship('academicYear', 'year_name')
                    ->required(),
            ]);
    }
}
