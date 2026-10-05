<?php

namespace App\Filament\Resources\Teachers\Schemas;

use App\Models\Branch;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('branch_id')
                    ->label('شعبه')
                    ->options(Branch::pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                TextInput::make('teacher_code')
                    ->label('کد استاد')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(50),

                TextInput::make('name')
                    ->label('نام استاد')
                    ->required()
                    ->maxLength(255),

                TextInput::make('father_name')
                    ->label('نام پدر')
                    ->maxLength(255),

                Select::make('gender')
                    ->label('جنسیت')
                    ->options([
                        'male' => 'ذکور',
                        'female' => 'اناث',
                    ]),

                TextInput::make('phone')
                    ->label('شماره تماس')
                    ->tel()
                    ->required()
                    ->maxLength(20),

                TextInput::make('email')
                    ->label('ایمیل')
                    ->email()
                    ->maxLength(255),

                Textarea::make('address')
                    ->label('آدرس')
                    ->rows(3),

                TextInput::make('qualification')
                    ->label('تحصیلات')
                    ->maxLength(255),

                TextInput::make('specialization')
                    ->label('تخصص')
                    ->maxLength(255),

                DatePicker::make('hire_date')
                    ->label('تاریخ استخدام')
                    ->native(false),

                TextInput::make('salary')
                    ->label('معاش')
                    ->numeric()
                    ->minValue(0),

                FileUpload::make('photo')
                    ->label('عکس استاد')
                    ->image()
                    ->directory('teachers'),

                Select::make('status')
                    ->label('وضعیت')
                    ->options([
                        'active' => 'فعال',
                        'inactive' => 'غیرفعال',
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