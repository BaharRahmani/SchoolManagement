<?php

namespace App\Filament\Widgets;

use App\Models\FeePayment;
use App\Models\Student;
use App\Models\StudentFee;
use App\Models\Teacher;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SchoolStatsOverview extends StatsOverviewWidget
{
    protected static bool $isDiscovered = false;

    protected static bool $isLazy = false;

    protected static ?int $sort = 1;

    protected int|array|null $columns = 4;

    protected function getStats(): array
    {
        $activeStudents = Student::query()->where('is_active', true)->count();
        $teachers = Teacher::query()->where('is_active', true)->count();
        $monthlyRevenue = (float) FeePayment::query()
            ->whereBetween('payment_date', [now()->startOfMonth(), now()->endOfMonth()])
            ->sum('amount_paid');
        $outstanding = max(
            0,
            (float) StudentFee::query()->sum('net_amount') - (float) FeePayment::query()->sum('amount_paid'),
        );

        return [
            Stat::make('شاگردان فعال', number_format($activeStudents))
                ->description('شاگردان فعال در همه شعبه‌ها')
                ->icon(Heroicon::AcademicCap)
                ->color('primary'),
            Stat::make('استادان', number_format($teachers))
                ->description('استادان فعال مکتب')
                ->icon(Heroicon::UserGroup)
                ->color('info'),
            Stat::make('عواید این ماه', $this->money($monthlyRevenue))
                ->description('مجموع رسیدهای فیس در ماه جاری')
                ->icon(Heroicon::ArrowTrendingUp)
                ->color('success'),
            Stat::make('باقی‌مانده فیس', $this->money($outstanding))
                ->description('فیس ثبت‌شده که هنوز مکمل پرداخت نشده')
                ->icon(Heroicon::ExclamationTriangle)
                ->color($outstanding > 0 ? 'warning' : 'success'),
        ];
    }

    protected function money(float $amount): string
    {
        return number_format($amount, 0).' افغانی';
    }
}
