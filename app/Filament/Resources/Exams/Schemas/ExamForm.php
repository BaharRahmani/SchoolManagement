<?php

namespace App\Filament\Resources\Exams\Schemas;

use App\Models\AcademicYear;
use App\Models\Branch;
use App\Models\SchoolClass;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ExamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

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

                TextInput::make('name')
                    ->label('نام امتحان')
                    ->placeholder('مثلاً امتحان چهارونیم ماهه')
                    ->required()
                    ->maxLength(255),

                Select::make('exam_type')
                    ->label('نوع امتحان')
                    ->options([
                        'monthly' => 'ماهانه',
                        'midterm' => 'چهارونیم ماهه',
                        'final' => 'سالانه',
                        'quiz' => 'کوییز',
                        'other' => 'سایر',
                    ])
                    ->default('monthly')
                    ->required(),

                DatePicker::make('start_date')
                    ->label('تاریخ شروع')
                    ->native(false)
                    ->required(),

                DatePicker::make('end_date')
                    ->label('تاریخ ختم')
                    ->native(false),

                Select::make('status')
                    ->label('وضعیت امتحان')
                    ->options([
                        'planned' => 'برنامه‌ریزی شده',
                        'active' => 'در حال برگزاری',
                        'completed' => 'تکمیل شده',
                        'cancelled' => 'لغو شده',
                    ])
                    ->default('planned')
                    ->required(),

                Textarea::make('description')
                    ->label('توضیحات')
                    ->rows(4)
                    ->columnSpanFull(),

            ]);
    }
}