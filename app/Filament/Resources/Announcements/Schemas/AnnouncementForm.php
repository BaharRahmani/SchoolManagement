<?php

namespace App\Filament\Resources\Announcements\Schemas;

use App\Models\Branch;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AnnouncementForm
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
                    ->preload(),

                TextInput::make('title')
                    ->label('عنوان اطلاعیه')
                    ->placeholder('مثلاً تعطیلی مکتب')
                    ->required()
                    ->maxLength(255),

                Textarea::make('content')
                    ->label('متن اطلاعیه')
                    ->required()
                    ->rows(7)
                    ->columnSpanFull(),

                DatePicker::make('publish_date')
                    ->label('تاریخ نشر')
                    ->native(false)
                    ->default(now())
                    ->required(),

                DatePicker::make('expire_date')
                    ->label('تاریخ ختم')
                    ->native(false),

                Select::make('target')
                    ->label('مخاطب')
                    ->options([
                        'all' => 'همه',
                        'teachers' => 'استادان',
                        'students' => 'شاگردان',
                        'parents' => 'والدین',
                        'staff' => 'کارمندان',
                    ])
                    ->default('all')
                    ->required(),

                Select::make('status')
                    ->label('وضعیت')
                    ->options([
                        'draft' => 'پیش‌نویس',
                        'published' => 'منتشر شده',
                        'expired' => 'منقضی شده',
                    ])
                    ->default('draft')
                    ->required(),

                TextInput::make('created_by')
                    ->label('ثبت کننده')
                    ->placeholder('نام ثبت کننده')
                    ->maxLength(255),

            ]);
    }
}