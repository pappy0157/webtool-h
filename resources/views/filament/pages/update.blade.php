<x-filament::page>
    <form wire:submit.prevent='submit'>
        @if(file_exists( base_path( 'upload.zip' ) ))
            <div class="flex items-start px-3 py-2 space-x-2 text-sm text-green-700 rounded shadow backdrop-blur-xl backdrop-saturate-150 rtl:space-x-reverse ring-1 bg-green-50/50 ring-green-500">Ready to Update! Press the Button down below to update.</div>
        
            <x-filament::button class="mt-3" wire:loading.attr="disabled" wire:loading.class="cursor-wait opacity-70" type="submit">
                <svg wire:loading="" wire:target="submit" class="w-6 h-6 mr-1 -ml-2 filament-button-icon rtl:ml-1 rtl:-mr-2 animate-spin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z"></path>
                </svg>
                <span>Perform Update</span>
            </x-filament::button>
        @else
            <div class="flex items-start px-3 py-2 space-x-2 text-sm rounded shadow backdrop-blur-xl backdrop-saturate-150 rtl:space-x-reverse text-danger-500 ring-1 bg-danger-50/50 ring-danger-300">Put the upload.zip file in the root of your website to update your script.</div>
        @endif
    </form>
</x-filament::page>
