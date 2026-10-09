<?php

namespace App\Filament\Resources\TeacherSubjectAssigns\Pages;

use App\Filament\Resources\TeacherSubjectAssigns\TeacherSubjectAssignResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTeacherSubjectAssigns extends ListRecords
{
    protected static string $resource = TeacherSubjectAssignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
