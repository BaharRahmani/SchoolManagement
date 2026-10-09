<?php

namespace App\Filament\Resources\TeacherSubjectAssigns;

use App\Filament\Navigation\AdminNavigation;
use App\Filament\Resources\TeacherSubjectAssigns\Pages\CreateTeacherSubjectAssign;
use App\Filament\Resources\TeacherSubjectAssigns\Pages\EditTeacherSubjectAssign;
use App\Filament\Resources\TeacherSubjectAssigns\Pages\ListTeacherSubjectAssigns;
use App\Filament\Resources\TeacherSubjectAssigns\Schemas\TeacherSubjectAssignForm;
use App\Filament\Resources\TeacherSubjectAssigns\Tables\TeacherSubjectAssignsTable;
use App\Models\TeacherSubjectAssign;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TeacherSubjectAssignResource extends Resource
{
    protected static ?string $model = TeacherSubjectAssign::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClock;

    protected static ?string $navigationLabel = 'تقسیم اوقات / تخصیص مضمون';

    protected static string|UnitEnum|null $navigationGroup = AdminNavigation::Staff;

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return TeacherSubjectAssignForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TeacherSubjectAssignsTable::configure($table);
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
            'index' => ListTeacherSubjectAssigns::route('/'),
            'create' => CreateTeacherSubjectAssign::route('/create'),
            'edit' => EditTeacherSubjectAssign::route('/{record}/edit'),
        ];
    }
}
