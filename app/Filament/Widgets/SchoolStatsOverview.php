<?php

namespace App\Filament\Widgets;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\Student;
use App\Models\Teacher;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SchoolStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(
                'تعداد شاگردان',
                Student::count()
            )
                ->description('تمام شاگردان ثبت شده')
                ->descriptionIcon('heroicon-m-academic-cap'),

            Stat::make(
                'تعداد استادان',
                Teacher::count()
            )
                ->description('استادان مکتب')
                ->descriptionIcon('heroicon-m-user-group'),

            Stat::make(
                'تعداد کارمندان',
                Employee::count()
            )
                ->description('کارمندان مکتب')
                ->descriptionIcon('heroicon-m-briefcase'),

            Stat::make(
                'تعداد شعبه‌ها',
                Branch::count()
            )
                ->description('شعبه‌های فعال و ثبت شده')
                ->descriptionIcon('heroicon-m-building-office-2'),
        ];
    }
}