<div x-data="window.bitflanToolBaseSearchComponent()" class="main-search-sec">
    <input x-model:value="query" type="text" placeholder="{{ trans('webtools/homepage.search-placeholder') }}">
    <ul class="main-search-dd" x-ref="list">
        @foreach(config('tools.categories') as $category)
            @foreach($category['tools'] as $key => $searchable)
                @if(isset($toolOptions['tool-' . $searchable['name'] . '.' . 'enabled']) && $toolOptions['tool-' . $searchable['name'] . '.' . 'enabled'][0]->payload != 'false')
                    <li data-name="{{ str_replace('"', '', $toolOptions['tool-' . $searchable['name'] . '.' . 'title'][0]->payload) }}" data-summary="{{ str_replace('"', '', $toolOptions['tool-' . $searchable['name'] . '.' . 'summary'][0]->payload) }}">
                        <a href="{{ route('tool', $slugs->{$key}) }}">
                            {{ str_replace('"', '', $toolOptions['tool-' . $searchable['name'] . '.' . 'title'][0]->payload) }}
                            <br>
                            <small>{{ str_replace('"', '', $toolOptions['tool-' . $searchable['name'] . '.' . 'summary'][0]->payload) }}</small>
                        </a>
                    </li>
                @endif
            @endforeach
        @endforeach
    </ul>
</div>