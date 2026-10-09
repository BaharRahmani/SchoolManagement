<?php

namespace App\Filament\Resources\StudentFees;

use App\Filament\Navigation\AdminNavigation;
use App\Filament\Resources\StudentFees\Pages\CreateStudentFee;
use App\Filament\Resources\StudentFees\Pages\EditStudentFee;
use App\Filament\Resources\StudentFees\Pages\ListStudentFees;
use App\Filament\Resources\StudentFees\Schemas\StudentFeeForm;
use App\Filament\Resources\StudentFees\Tables\StudentFeesTable;
use App\Models\StudentFee;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class StudentFeeResource extends Resource
{
    protected static ?string $model = StudentFee::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static ?string $navigationLabel = 'فیس شاگردان';

    protected static string|UnitEnum|null $navigationGroup = AdminNavigation::Finance;

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return StudentFeeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudentFeesTable::configure($table);
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
            'index' => ListStudentFees::route('/'),
            'create' => CreateStudentFee::route('/create'),
            'edit' => EditStudentFee::route('/{record}/edit'),
        ];
    }
}
