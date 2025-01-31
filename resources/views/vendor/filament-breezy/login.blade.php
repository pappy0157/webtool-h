<x-filament-breezy::auth-card action="authenticate">

    <div class="w-full flex justify-center">
        <x-filament::brand />
    </div>

    <div>
        <h2 class="font-bold tracking-tight text-center text-2xl">
            {{ __('filament::login.heading') }}
        </h2>
    </div>

    {{ $this->form }}

    <x-filament::button wire:loading.attr="disabled" wire:loading.class="opacity-70 cursor-wait" type="submit" class="w-full">
        <svg wire:loading="" wire:target="submit" class="filament-button-icon w-6 h-6 mr-1 -ml-2 rtl:ml-1 rtl:-mr-2 animate-spin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z"></path>
        </svg>
        <span>
            {{ __('filament::login.buttons.submit.label') }}
        </span>
    </x-filament::button>

    <div class="text-center">
        <a class="text-primary-600 hover:text-primary-700" href="{{route(config('filament-breezy.route_group_prefix').'password.request')}}">{{ __('filament-breezy::default.login.forgot_password_link') }}</a>
    </div>
</x-filament-breezy::auth-card>
