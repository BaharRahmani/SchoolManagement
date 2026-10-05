<?php

namespace App\Filament\Resources\StudentDocuments\Pages;

use App\Filament\Resources\StudentDocuments\StudentDocumentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewStudentDocument extends ViewRecord
{
    protected static string $resource = StudentDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
