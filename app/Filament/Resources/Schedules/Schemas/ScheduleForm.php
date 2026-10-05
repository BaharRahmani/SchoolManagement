<?php

namespace App\Filament\Resources\Schedules\Schemas;

use App\Models\Branch;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Teacher;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ScheduleForm
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

                Select::make('teacher_id')
                    ->label('استاد')
                    ->options(
                        Teacher::query()
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

                Select::make('day')
                    ->label('روز')
                    ->options([
                        'saturday' => 'شنبه',
                        'sunday' => 'یکشنبه',
                        'monday' => 'دوشنبه',
                        'tuesday' => 'سه‌شنبه',
                        'wednesday' => 'چهارشنبه',
                        'thursday' => 'پنجشنبه',
                    ])
                    ->required(),

                TimePicker::make('start_time')
                    ->label('وقت شروع')
                    ->seconds(false)
                    ->required(),

                TimePicker::make('end_time')
                    ->label('وقت ختم')
                    ->seconds(false)
                    ->required(),

                TextInput::make('room')
                    ->label('اتاق / صنف')
                    ->maxLength(100),

                Toggle::make('is_active')
                    ->label('برنامه فعال')
                    ->default(true),
            ]);
    }
}