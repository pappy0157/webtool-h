@if($generalSettings->customStyles)
    <style>
        {!! $generalSettings->customStyles !!}
    </style>
@endif

@if(isset($styles) && $styles)
    @foreach($styles as $style)
        <link rel="stylesheet" href="{{ $style[1] == 'internal' ? asset($style[0]) : $style[0] }}">
    @endforeach
@endif

@foreach($generalSettings->styles as $style)
    <link rel="stylesheet" href="{{ $style['url'] }}">
@endforeach


@foreach($generalSettings->scripts as $script)
    @if($script['location'] == 'header')
        <script src="{{ $script['url'] }}"></script>
    @endif
@endforeach

<script>
    window.bitflanBaseUrl = '{{ url("/") }}';
    window.copiedIntlString = `{{ trans('webtools/general.copied') }}`;
</script>

@if($adSettings->popAdStatus && $adSettings->popAdLocation == 'header')
    {!! $adSettings->popAdCode !!}
@endif

@if($generalSettings->headerTags)
    {!! $generalSettings->headerTags !!}
@endif