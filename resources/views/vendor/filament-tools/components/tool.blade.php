@props(['tool'])

<x-filament::card :heading="$tool->getLabel()" class="col-span-{{ $tool->getColumnSpan() }}">
    <x-filament::form wire:submit.prevent="callToolSubmitAction({{ json_encode($tool->getId()) }})">
        @if($tool->hasView())
            {{ $tool->getView() }}
        @else
            {{ $this->getCachedForm($tool->getId()) }}

            <x-filament::button wire:loading.attr="disabled" wire:loading.class="opacity-70 cursor-wait" type="submit">
                <svg wire:loading wire:target="submit" class="filament-button-icon w-6 h-6 mr-1 -ml-2 rtl:ml-1 rtl:-mr-2 animate-spin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z"></path>
                </svg>
                <span>{{ $tool->getSubmitButtonLabel() }}</span>
            </x-filament::button>
        @endif
    </x-filament::form>
</x-filament::card>
