<?php

namespace App\Filament\Resources\TeacherSubjectAssigns\Pages;

use App\Filament\Resources\TeacherSubjectAssigns\TeacherSubjectAssignResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTeacherSubjectAssign extends EditRecord
{
    protected static string $resource = TeacherSubjectAssignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
