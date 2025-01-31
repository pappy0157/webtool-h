<x-filament-breezy::auth-card action="submit">
    <div class="w-full flex justify-center">
        <x-filament::brand />
    </div>

    <div>
        <h2 class="font-bold tracking-tight text-center text-2xl">
            {{ __('filament-breezy::default.reset_password.heading') }}
        </h2>
        <p class="mt-2 text-sm text-center">
            {{ __('filament-breezy::default.or') }}
            <a class="text-primary-600" href="{{route('filament.auth.login')}}">
                {{ strtolower(__('filament::login.heading')) }}
            </a>
        </p>
    </div>

    @unless($hasBeenSent)
    {{ $this->form }}

    <x-filament::button wire:loading.attr="disabled" wire:loading.class="opacity-70 cursor-wait" type="submit" class="w-full">
        <svg wire:loading="" wire:target="submit" class="filament-button-icon w-6 h-6 mr-1 -ml-2 rtl:ml-1 rtl:-mr-2 animate-spin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z"></path>
        </svg>
        <span>
            {{ __('filament-breezy::default.reset_password.submit.label') }}
        </span>
    </x-filament::button>
    @else
    <span class="block text-center text-success-600 font-semibold">{{ __('filament-breezy::default.reset_password.notification_success') }}</span>
    @endunless
</x-filament-breezy::auth-card>
