<?php

namespace App\Filament\Resources\Enrollments\Schemas;

use App\Models\AcademicYear;
use App\Models\Branch;
use App\Models\SchoolClass;
use App\Models\Student;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EnrollmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

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

                Select::make('class_id')
                    ->label('صنف')
                    ->options(
                        SchoolClass::query()
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('roll_number')
                    ->label('شماره رول')
                    ->maxLength(50),

                DatePicker::make('enrollment_date')
                    ->label('تاریخ ثبت‌نام')
                    ->native(false)
                    ->default(now())
                    ->required(),

                Select::make('status')
                    ->label('وضعیت ثبت‌نام')
                    ->options([
                        'active' => 'فعال',
                        'completed' => 'تکمیل شده',
                        'transferred' => 'انتقال شده',
                        'cancelled' => 'لغو شده',
                    ])
                    ->default('active')
                    ->required(),

                Textarea::make('description')
                    ->label('توضیحات')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}