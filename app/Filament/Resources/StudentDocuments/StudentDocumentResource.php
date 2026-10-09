<?php

namespace App\Filament\Resources\StudentDocuments;

use App\Filament\Resources\StudentDocuments\Pages\CreateStudentDocument;
use App\Filament\Resources\StudentDocuments\Pages\EditStudentDocument;
use App\Filament\Resources\StudentDocuments\Pages\ListStudentDocuments;
use App\Filament\Resources\StudentDocuments\Pages\ViewStudentDocument;
use App\Filament\Resources\StudentDocuments\Schemas\StudentDocumentForm;
use App\Filament\Resources\StudentDocuments\Schemas\StudentDocumentInfolist;
use App\Filament\Resources\StudentDocuments\Tables\StudentDocumentsTable;
use App\Models\StudentDocument;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StudentDocumentResource extends Resource
{
    protected static ?string $model = StudentDocument::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return StudentDocumentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StudentDocumentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudentDocumentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStudentDocuments::route('/'),
            'create' => CreateStudentDocument::route('/create'),
            'view' => ViewStudentDocument::route('/{record}'),
            'edit' => EditStudentDocument::route('/{record}/edit'),
        ];
    }
}
