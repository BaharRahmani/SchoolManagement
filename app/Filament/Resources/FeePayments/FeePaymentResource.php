<?php

namespace App\Filament\Resources\FeePayments;

use App\Filament\Navigation\AdminNavigation;
use App\Filament\Resources\FeePayments\Pages\CreateFeePayment;
use App\Filament\Resources\FeePayments\Pages\EditFeePayment;
use App\Filament\Resources\FeePayments\Pages\ListFeePayments;
use App\Filament\Resources\FeePayments\Schemas\FeePaymentForm;
use App\Filament\Resources\FeePayments\Tables\FeePaymentsTable;
use App\Models\FeePayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FeePaymentResource extends Resource
{
    protected static ?string $model = FeePayment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedReceiptPercent;

    protected static ?string $navigationLabel = 'پرداخت‌ها و رسیدات';

    protected static string|UnitEnum|null $navigationGroup = AdminNavigation::Finance;

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'receipt_no';

    public static function form(Schema $schema): Schema
    {
        return FeePaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeePaymentsTable::configure($table);
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
            'index' => ListFeePayments::route('/'),
            'create' => CreateFeePayment::route('/create'),
            'edit' => EditFeePayment::route('/{record}/edit'),
        ];
    }
}
