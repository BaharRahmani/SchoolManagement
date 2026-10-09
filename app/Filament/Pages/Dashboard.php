<?php

namespace App\Filament\Pages;

use App\Filament\Navigation\AdminNavigation;
use BackedEnum;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class Dashboard extends BaseDashboard
{
    protected static bool $isDiscovered = false;

    protected static ?string $navigationLabel = 'داشبورد';

    protected static ?string $title = 'داشبورد';

    protected static string|UnitEnum|null $navigationGroup = AdminNavigation::General;

    protected static ?int $navigationSort = 1;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    public function getColumns(): int|array
    {
        return 1;
    }
}
