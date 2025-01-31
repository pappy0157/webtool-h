<x-filament::page>
    <div x-data class="flex flex-col gap-2">
        @foreach($this->records as $i => $record)
            <div wire:loading.class="opacity-75 cursor-disabled" class="flex items-center justify-between w-full p-4 bg-white border border-white rounded-lg shadow-sm">
                <span>{{ $record->{static::$titleField} }}</span>

                <div class="flex flex-row gap-2">
                    <button wire:click="moveUp({{ $i }})" class="flex items-center justify-center w-8 h-8 text-gray-500 border rounded-full hover:bg-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                        </svg>
                    </button>

                    <button wire:click="moveDown({{ $i }})" class="flex items-center justify-center w-8 h-8 text-gray-500 border rounded-full hover:bg-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6" />
                        </svg>
                    </button>

                    <a href="{{ static::getResource()::getUrl('edit', $record) }}" class="flex items-center justify-center w-8 h-8 text-gray-500 border rounded-full hover:bg-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-filament::page>
