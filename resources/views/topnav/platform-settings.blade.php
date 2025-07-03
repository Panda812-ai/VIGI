@if (auth()->check() && auth()->user()->hasAnyRole('super_admin', 'admin'))
    <div>
        <x-filament::button
            color="gray"
            size="sm"
            icon="heroicon-o-cog-8-tooth"
            icon-position="before"
            tag="a"
            href="{{ App\Filament\Clusters\Settings::getUrl() }}"
            class="filament-top-nav-settings-button">
                {{ __('Settings') }}
        </x-filament::button>
    </div>
@endif
