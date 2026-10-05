<?php

namespace App\Filament\Resources\TeacherAttendances\Schemas;

use App\Models\Branch;
use App\Models\Teacher;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class TeacherAttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

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