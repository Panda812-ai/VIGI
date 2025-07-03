<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentView;
use Illuminate\Contracts\View\View;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\ServiceProvider;
use Filament\Forms\Components\Select;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        $config = function($class) {
            $class::configureUsing(function($instance) {
                $instance->native(false);
            });
        };

        $config(Select::class);

        FilamentView::registerRenderHook(
            PanelsRenderHook::GLOBAL_SEARCH_AFTER,
            fn (): View => view('topnav.platform-settings'),
        );
    }
}
