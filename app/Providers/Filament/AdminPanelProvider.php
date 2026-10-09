<?php

namespace App\Providers\Filament;

use App\Filament\Navigation\AdminNavigation;
use App\Filament\Pages\Dashboard;
use App\Filament\Widgets\SchoolStatsOverview;
use App\Http\Middleware\UseDariPanelLocale;
use Filament\Actions\Action;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('admin')
            ->login()
            ->profile()
            ->passwordReset()
            ->brandName('پنل مدیریتی مکتب خصوصی استاد عطایی')
            ->font('Vazirmatn')
            ->darkMode()
            ->spa()
            ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('19rem')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->colors([
                'primary' => Color::Emerald,
                'secondary' => Color::Indigo,
                'gray' => Color::Slate,
                'info' => Color::Indigo,
                'success' => Color::Green,
                'warning' => Color::Amber,
                'danger' => Color::Rose,
            ])
            ->navigationGroups([
                NavigationGroup::make(AdminNavigation::General)
                    ->icon(Heroicon::OutlinedHome)
                    ->collapsible(),
                NavigationGroup::make(AdminNavigation::Academic)
                    ->icon(Heroicon::OutlinedAcademicCap)
                    ->collapsible(),
                NavigationGroup::make(AdminNavigation::Staff)
                    ->icon(Heroicon::OutlinedBriefcase)
                    ->collapsible(),
                NavigationGroup::make(AdminNavigation::Attendance)
                    ->icon(Heroicon::OutlinedCheckBadge)
                    ->collapsible(),
                NavigationGroup::make(AdminNavigation::Finance)
                    ->icon(Heroicon::OutlinedBanknotes)
                    ->collapsible(),
                NavigationGroup::make(AdminNavigation::System)
                    ->icon(Heroicon::OutlinedCog6Tooth)
                    ->collapsible(),
            ])
            ->userMenuItems([
                'profile' => fn (Action $action): Action => $action
                    ->label('پروفایل')
                    ->icon(Heroicon::OutlinedUserCircle),
                'logout' => fn (Action $action): Action => $action
                    ->label('خروج')
                    ->icon(Heroicon::OutlinedArrowRightStartOnRectangle),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                SchoolStatsOverview::class,
            ])
            ->middleware([
                UseDariPanelLocale::class,
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
