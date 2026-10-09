<?php

namespace App\Filament\Pages;

use App\Filament\Navigation\AdminNavigation;
use App\Filament\Widgets\SchoolStatsOverview;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;
use UnitEnum;

class Reports extends Page
{
    protected static ?string $navigationLabel = 'گزارش‌ها';

    protected static ?string $title = 'گزارش‌ها';

    protected static string|UnitEnum|null $navigationGroup = AdminNavigation::System;

    protected static ?int $navigationSort = 2;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;

    protected static ?string $slug = 'reports';

    /**
     * @return array<class-string<Widget> | WidgetConfiguration>
     */
    protected function getHeaderWidgets(): array
    {
        return [
            SchoolStatsOverview::class,
        ];
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('گزارش‌های مکتب')
                    ->description('خلاصه شاگردان فعال، استادان، عواید این ماه و باقی‌مانده فیس در کارت‌های بالا نمایش داده می‌شود. جزئیات فیس، معاش و مصارف در بخش امور مالی است.')
                    ->schema([]),
            ]);
    }
}
