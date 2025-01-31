@extends('layouts.main')

@section('content')

<div class="hero-section">
    <h2>{{ trans('webtools/homepage.title') }}</h2>
    <h1>{{ trans('webtools/homepage.heading') }}</h1>
</div>

@include("modules.tools.search-base")

<div class="single-page-sec">
    @include( $tool['templates']['header'], [
        'tool' => $tool['name']
    ] )

    <x-ads.top-banner />

    <div class="single-page-inner">
        <form>
            <div class="form-group">
                <label for="encodeQuote" class="custom-label">{{ trans('webtools/tools/quoted-printable-encode.label') }}</label>
                <textarea type="text" name="encodeQuote" id="encodeQuote" class="custom-textarea" placeholder='{{ trans('webtools/tools/quoted-printable-encode.placeholder') }}' rows="5" required>{{ request()->input('encodeQuote') }}</textarea>
                <input type="hidden" name="submit" value="true">
            </div>
            <button class="btn custom--btn button__lg">{{ trans('webtools/tools/quoted-printable-encode.submit') }}</button>
            @if (request()->input('submit') && request()->input('encodeQuote') == '')
                <div class="alert alert-danger rounded-pill mt-3 p-l-25 p-r-25 bg-danger border-0"><h5 class="m-0 text-light">{{ trans('webtools/tools/quoted-printable-encode.fieldEmpty') }}</h5></div>
            @endif
        </form>

        @if ($encoded_printable)
            <hr class="">

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="custom-label">{{ trans('webtools/tools/quoted-printable-encode.converted-label') }}</label>
                        <div class="copy-textarea-btn">
                            <textarea type="email" id="encoded-copy" class="custom-textarea" rows="9">{{ $quoted-printable-encode }}</textarea>
                            <button onclick="window.writeClipboardTextVanilla(this, document.getElementById('encoded-copy').value)" class="btn custom--btn button__md copy-btn btn__dark">{{ trans('webtools/tools/quoted-printable-encode.btn-copy') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <hr class="small-marg">
        <h2>{{ get_tool_title($tool['name'], $toolSettings->title) }}</h2>
        <p>{!! get_tool_description($tool['name'], $toolSettings->description) !!}</p>
    </div>

    <x-ads.middle-banner />
</div>
<div class="content-sec">
    <div class="content-sec-inner">
        <div class="content-title-sec">
            <div class="content-title-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                    <path id="chart-relationship" d="M29.25,6.75a4.5,4.5,0,0,0-4.34,3.375H20.171A8.995,8.995,0,1,0,10.125,20.171V24.91a4.5,4.5,0,1,0,2.25,0V20.173A8.945,8.945,0,0,0,16.76,18.35l4.128,4.129a4.447,4.447,0,0,0-.638,2.271,4.5,4.5,0,1,0,4.5-4.5,4.446,4.446,0,0,0-2.271.638L18.35,16.759a8.944,8.944,0,0,0,1.823-4.384H24.91A4.492,4.492,0,1,0,29.25,6.75Z" transform="translate(-2.251 -2.251)" fill="#fff"/>
                </svg>
            </div>
            <h3>{{ trans('webtools/general.related') }}</h3>
        </div>
        <div class="content-cats-sec">
            @foreach($related as $toolKey => $relatedTool)
                @if($relatedTool['name'] != $tool['name'])
                    @if($toolOptions['tool-' . $relatedTool['name'] . '.' . 'enabled'][0]->payload != 'false')
                        <div class="content-cats-col">
                            <a href="{{ !can_use($toolKey) ? route('pricing') : route('tool', $toolSlugs->{$toolKey}) }}" class="content-cats-inner {{ !can_use($toolKey) ? 'locked' : '' }}">
                                @include($relatedTool['templates']['selector'], [
                                    'tool'    => $relatedTool['name'],
                                    'title'   => get_tool_title($relatedTool['name'], str_replace('"', '', $toolOptions['tool-' . $relatedTool['name'] . '.' . 'title'][0]->payload)),
                                    'summary' => get_tool_summary($relatedTool['name'], str_replace('"', '', $toolOptions['tool-' . $relatedTool['name'] . '.' . 'summary'][0]->payload)),
                                ])
                            </a>
                        </div>
                    @endif
                @endif

            @endforeach
        </div>
    </div>

    <x-ads.bottom-banner />

</div>

@endsection

