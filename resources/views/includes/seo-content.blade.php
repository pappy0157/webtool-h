<link rel="canonical" href="{{ url()->current() }}" />
<meta name="title" content="{{ $title }} — {{ $generalSettings->websiteTitle }}">
<meta name="description" content="{{ $description }}">

@if($keywords)
<meta name="keywords" content="{{ $keywords }}">
@endif

<meta property="og:type" content="website">
<meta property="og:url" content="{{ url('/') }}">
<meta property="og:title" content="{{ $title }} — {{ $generalSettings->websiteTitle }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ storage_url($generalSettings->ogImage) }}">

<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url('/') }}">
<meta property="twitter:title" content="{{ $title }} — {{ $generalSettings->websiteTitle }}">
<meta property="twitter:description" content="{{ $description }}">
<meta property="twitter:image" content="{{ storage_url($generalSettings->ogImage) }}">