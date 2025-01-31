@extends('frontend.layouts.main')

@section('content')

<div class="single-page-sec">
    @include("modules.tools.website-status-checker.header")

    <div class="single-page-inner">

        @if(isset($component))
            @livewire($component)
        @else
            @include($view)
        @endif

        <hr class="small-marg">
        <h2>About {{ $toolSettings->title }}</h2>
        <p>{!! $toolSettings->description !!}</p>
    </div>
</div>
<div class="content-sec">
    <div class="content-sec-inner">
        <div class="content-title-sec">
            <div class="content-title-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                    <path id="chart-relationship" d="M29.25,6.75a4.5,4.5,0,0,0-4.34,3.375H20.171A8.995,8.995,0,1,0,10.125,20.171V24.91a4.5,4.5,0,1,0,2.25,0V20.173A8.945,8.945,0,0,0,16.76,18.35l4.128,4.129a4.447,4.447,0,0,0-.638,2.271,4.5,4.5,0,1,0,4.5-4.5,4.446,4.446,0,0,0-2.271.638L18.35,16.759a8.944,8.944,0,0,0,1.823-4.384H24.91A4.492,4.492,0,1,0,29.25,6.75Z" transform="translate(-2.251 -2.251)" fill="#fff"/>
                </svg>
            </div>
            <div class="main-subtitle">Related</div>
        </div>
        <div class="content-cats-sec">
            @foreach($related as $relatedTool)
                @if($relatedTool['name'] != $tool['name'])
                    @php ($relatedToolSettings = app($relatedTool['settings']))

                    @if($relatedToolSettings->enabled)
                        <div class="content-cats-col">
                            <a href="{{ route('tool', $toolSlugs->{$relatedTool['slug-key']}) }}" class="content-cats-inner">
                                @include( $tool['templates']['selector'] , [ 'toolSettings' => $relatedToolSettings ])
                            </a>
                        </div>
                    @endif
                @endif

            @endforeach
        </div>
    </div>
</div>

@endsection
