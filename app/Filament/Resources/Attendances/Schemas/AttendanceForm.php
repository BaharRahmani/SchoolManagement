<?php

namespace App\Filament\Resources\Attendances\Schemas;

use App\Models\SchoolClass;
use App\Models\Student;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class AttendanceForm
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

                DatePicker::make('date')
                    ->label('تاریخ')
                    ->native(false)
                    ->default(now())
                    ->required(),

                Select::make('status')
                    ->label('وضعیت حضور')
                    ->options([
                        'present' => 'حاضر',
                        'absent' => 'غایب',
                        'late' => 'دیر آمده',
                        'leave' => 'رخصت',
                    ])
                    ->default('present')
                    ->required(),

                TimePicker::make('check_in')
                    ->label('وقت ورود')
                    ->seconds(false),

                TimePicker::make('check_out')
                    ->label('وقت خروج')
                    ->seconds(false),

                Textarea::make('note')
                    ->label('یادداشت')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}