<?php

namespace App\Filament\Resources\Attendances\Schemas;

use App\Enums\AttendanceStatus;
use App\Models\AcademicYear;
use App\Models\Section;
use App\Models\Student;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('student_id')
                    ->label('شاگرد')
                    ->options(Student::query()->pluck('first_name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('section_id')
                    ->label('شعبه صنف')
                    ->options(Section::query()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('academic_year_id')
                    ->label('سال تعلیمی')
                    ->options(AcademicYear::query()->pluck('year_name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                DatePicker::make('date')
                    ->label('تاریخ')
                    ->native(false)
                    ->default(now())
                    ->required(),
                Select::make('status')
                    ->label('وضعیت حضور')
                    ->options(AttendanceStatus::class)
                    ->default(AttendanceStatus::Present)
                    ->required(),
                Textarea::make('remarks')
                    ->label('یادداشت')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
