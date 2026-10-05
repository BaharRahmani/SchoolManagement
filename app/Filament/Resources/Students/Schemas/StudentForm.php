<?php

namespace App\Filament\Resources\Students\Schemas;

use App\Models\Branch;
use App\Models\StudentParent;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class StudentForm
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

                Select::make('student_parent_id')
                    ->label('والد / سرپرست')
                    ->options(
                        StudentParent::query()
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->searchable()
                    ->preload(),

                TextInput::make('student_code')
                    ->label('کد شاگرد')
                    ->placeholder('مثلاً STD-001')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(50),

                TextInput::make('name')
                    ->label('نام شاگرد')
                    ->required()
                    ->maxLength(255),

                TextInput::make('father_name')
                    ->label('نام پدر')
                    ->required()
                    ->maxLength(255),

                TextInput::make('grandfather_name')
                    ->label('نام پدرکلان')
                    ->maxLength(255),

                Select::make('gender')
                    ->label('جنسیت')
                    ->options([
                        'male' => 'ذکور',
                        'female' => 'اناث',
                    ])
                    ->required(),

                DatePicker::make('date_of_birth')
                    ->label('تاریخ تولد')
                    ->native(false),

                TextInput::make('phone')
                    ->label('شماره تماس')
                    ->tel()
                    ->maxLength(30),

                Textarea::make('address')
                    ->label('آدرس')
                    ->rows(3)
                    ->columnSpanFull(),

                FileUpload::make('photo')
                    ->label('عکس شاگرد')
                    ->image()
                    ->directory('students')
                    ->imageEditor(),

                DatePicker::make('admission_date')
                    ->label('تاریخ ثبت‌نام')
                    ->native(false),

                Select::make('status')
                    ->label('وضعیت شاگرد')
                    ->options([
                        'active' => 'فعال',
                        'inactive' => 'غیرفعال',
                        'graduated' => 'فارغ‌التحصیل',
                        'left' => 'ترک تحصیل',
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