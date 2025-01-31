@if(isset($scripts) && $scripts)
    @foreach($scripts as $script)
        <script src="{{ $script[1] == 'internal' ? asset($script[0]) : $script[0] }}"></script>
    @endforeach
@endif

@foreach($generalSettings->scripts as $script)
    @if($script['location'] == 'footer')
        <script src="{{ $script['url'] }}"></script>
    @endif
@endforeach

@if($adSettings->popAdStatus && $adSettings->popAdLocation == 'footer')
    {!! $adSettings->popAdCode !!}
@endif