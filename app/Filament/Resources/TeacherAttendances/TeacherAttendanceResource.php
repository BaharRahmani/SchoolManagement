<?php

namespace App\Filament\Resources\TeacherAttendances;

use App\Filament\Resources\TeacherAttendances\Pages\CreateTeacherAttendance;
use App\Filament\Resources\TeacherAttendances\Pages\EditTeacherAttendance;
use App\Filament\Resources\TeacherAttendances\Pages\ListTeacherAttendances;
use App\Filament\Resources\TeacherAttendances\Pages\ViewTeacherAttendance;
use App\Filament\Resources\TeacherAttendances\Schemas\TeacherAttendanceForm;
use App\Filament\Resources\TeacherAttendances\Schemas\TeacherAttendanceInfolist;
use App\Filament\Resources\TeacherAttendances\Tables\TeacherAttendancesTable;
use App\Models\TeacherAttendance;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TeacherAttendanceResource extends Resource
{
    protected static ?string $model = TeacherAttendance::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $recordTitleAttribute = 'teacher_id';

    public static function form(Schema $schema): Schema
    {
        return TeacherAttendanceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TeacherAttendanceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TeacherAttendancesTable::configure($table);
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
            'index' => ListTeacherAttendances::route('/'),
            'create' => CreateTeacherAttendance::route('/create'),
            'view' => ViewTeacherAttendance::route('/{record}'),
            'edit' => EditTeacherAttendance::route('/{record}/edit'),
        ];
    }
}
