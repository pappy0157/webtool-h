<x-filament::widget class="filament-account-widget">
    <x-filament::card>
        <div class="flex items-center h-12 space-x-4 rtl:space-x-reverse">
            <div class="flex items-center justify-center w-10 h-10 font-bold text-white bg-indigo-500 bg-center bg-contain rounded-lg text-md">{{ $this->version }}</div>

            <div>
                <h2 class="text-lg font-bold tracking-tight sm:text-xl">
                    {{ $this->name }}
                </h2>

                <p class="text-sm">
                    <a href="{{ $this->vendor_url }}" class="text-gray-600 hover:text-primary-500 focus:outline-none focus:underline">{{ $this->vendor }}</a>
                </p>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
