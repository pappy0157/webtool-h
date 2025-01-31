@extends('layouts.main')

@section('content')

<div class="hero-section">
    <div class="hero-small-title">{{ trans('webtools/homepage.title') }}</div>
    <h1>{{ trans('webtools/homepage.heading') }}</h1>
</div>
<div class="main-search-sec">
    <input x-data="window.bitflanToolSearchComponent()" type="text" placeholder="{{ trans('webtools/homepage.search-placeholder') }}">
</div>

<x-ads.top-banner />

<div class="content-sec">

    @foreach($categories as $category)
        <div data-category data-count="{{ count($category['tools']) }}" class="content-sec-inner">
            <div class="content-title-sec">
                @include($category['view'])
            </div>
            <div class="content-cats-sec">
                @foreach($category['tools'] as $key => $tool)
                    @if($toolOptions['tool-' . $tool['name'] . '.' . 'enabled'][0]->payload != 'false')
                        <div class="content-cats-col" data-tool data-name="{{ str_replace('"', '', $toolOptions['tool-' . $tool['name'] . '.' . 'title'][0]->payload) }}" data-summary="{{ str_replace('"', '', $toolOptions['tool-' . $tool['name'] . '.' . 'summary'][0]->payload) }}">
                            <a href="{{ !can_use($key) ? route('pricing') : route('tool', $slugs->{$key}) }}" class="content-cats-inner {{ !can_use($key) ? 'locked' : '' }}">
                                @include($tool['templates']['selector'], [
                                    'tool'    => $tool['name'],
                                    'title'   => get_tool_title($tool['name'], str_replace('"', '', $toolOptions['tool-' . $tool['name'] . '.' . 'title'][0]->payload)),
                                    'summary' => get_tool_summary($tool['name'], str_replace('"', '', $toolOptions['tool-' . $tool['name'] . '.' . 'summary'][0]->payload)),
                                ])
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    @endforeach

</div>

<x-ads.bottom-banner />

@endsection
