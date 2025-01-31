<x-filament::page>

    <div class="mb-4 p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
        role="alert">
        <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Note</span>
        <span class="font-semibold mr-2 text-left flex-auto leading-5">If <strong>Language Settings > Translate Tool Titles & Description</strong> is turned on, then the titles and descriptions specified in the translation files will be used instead of these settings.</span>
    </div>
    

    @foreach ($this->allTools as $category)
        <div class="pb-4">
            <div>
                <h3 class="text-lg font-bold">{{ $category['admin']['title'] }}</h3>
            </div>
    
            <div class="grid grid-cols-4 gap-4 mt-3">
                @foreach ($category['tools'] as $tool)
                    <div class="p-2 space-y-2 bg-white shadow rounded-xl">
                        <div class="px-4 py-2">
                            <div class="flex flex-col gap-4 xl:flex-row xl:items-center xl:justify-between">
                                <h2 class="text-xl font-semibold tracking-tight filament-card-heading">
                                    {{ $tool['admin']['title'] }}
                                </h2>
    
                            </div>
                        </div>
    
                        <div aria-hidden="true" class="border-t filament-hr"></div>
    
                        <div class="space-y-2">
                            <div class="px-4 py-2 space-y-4">
                                <div class="space-y-6">
                                    <p>
                                        {{ $tool['admin']['summary'] }}
                                    </p>
    
                                    <a href="{{ ($tool['admin']['settings-page'])::getUrl() }}" class="inline-flex items-center justify-center px-4 font-medium tracking-tight text-white transition-colors border border-transparent rounded-lg shadow focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset filament-button h-9 focus:ring-white bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700">
                                        <span>Settings</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    {{-- <div class="flex items-center justify-between w-full p-4 bg-white border border-white rounded-lg shadow-sm">
        <span>{{ $record->{static::$titleField} }}</span>

        <div class="flex flex-row gap-2">
            <button wire:click="moveUp({{ $i }})"
                class="flex items-center justify-center w-8 h-8 text-gray-500 border rounded-full hover:bg-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 11l5-5m0 0l5 5m-5-5v12" />
                </svg>
            </button>

            <button wire:click="moveDown({{ $i }})"
                class="flex items-center justify-center w-8 h-8 text-gray-500 border rounded-full hover:bg-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 13l-5 5m0 0l-5-5m5 5V6" />
                </svg>
            </button>

            <a href="{{ static::getResource()::getUrl('edit', $record) }}"
                class="flex items-center justify-center w-8 h-8 text-gray-500 border rounded-full hover:bg-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </a>
        </div>
    </div> --}}
</x-filament::page>
