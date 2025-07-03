<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Navigation\MenuItem;
use App\Filament\Resources\UserResource;
use App\Filament\Resources\RoleResource;
use Filament\Forms\Components\FileUpload;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Filament\Support\Colors\Color;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;
use Swis\Filament\Backgrounds\ImageProviders\MyImages;


class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel

        ->brandLogo(asset('images/logo.png'))
        ->brandLogoHeight('3rem')
        ->favicon(asset('images/logo.png'))

            ->colors([
                'gray' => Color::Gray,
                'primary' => Color::Blue,

            ])
            ->default()
            ->id('admin')
            ->path('admin')
            ->authGuard('web')
            ->login()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->discoverClusters(in: app_path('Filament/Clusters'), for: 'App\\Filament\\Clusters')
            ->sidebarCollapsibleOnDesktop()
            ->databaseNotifications()
            ->pages([
                Pages\Dashboard::class,

            ])
            ->widgets([
                \App\Filament\Widgets\AdminWidget::class,



            ])
            ->userMenuItems([
                MenuItem::make()
                    ->label('Manage Users')
                    ->url(fn(): string => UserResource::getUrl())
                    ->icon('heroicon-o-user-group'),

                MenuItem::make()
                    ->label('Manage Roles')
                    ->url(fn(): string => RoleResource::getUrl())
                    ->icon('heroicon-o-key')
                   # ->visible(auth()->user()->hasAnyRole(['super_admin','admin'])),

            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([





                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make(),
                BreezyCore::make()
                    ->avatarUploadComponent(fn() => FileUpload::make('avatar')->directory('users/avatars'))
                    ->myProfile(
                        shouldRegisterUserMenu: true,
                        userMenuLabel: 'My Profile',
                        shouldRegisterNavigation: false,
                        hasAvatars: true,
                        slug: 'my-profile'
                    )
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
