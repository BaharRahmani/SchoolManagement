<?php

namespace App\Filament\Resources\StudentDocuments\Schemas;

use App\Models\Student;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class StudentDocumentForm
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

                Select::make('document_type')
                    ->label('نوع سند')
                    ->options([
                        'identity' => 'تذکره',
                        'birth_certificate' => 'تولدنامه',
                        'previous_certificate' => 'سند تحصیلی قبلی',
                        'photo' => 'عکس',
                        'transfer' => 'تبدیلی',
                        'certificate' => 'تصدیق‌نامه',
                        'other' => 'سایر',
                    ])
                    ->searchable()
                    ->required(),

                FileUpload::make('file')
                    ->label('فایل سند')
                    ->disk('public')
                    ->directory('student-documents')
                    ->visibility('public')
                    ->acceptedFileTypes([
                        'application/pdf',
                        'image/jpeg',
                        'image/png',
                        'image/jpg',
                    ])
                    ->maxSize(5120)
                    ->required(),

                Textarea::make('description')
                    ->label('توضیحات')
                    ->rows(4)
                    ->columnSpanFull(),

            ]);
    }
}