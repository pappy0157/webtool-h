@extends('layouts.main')

@section('content')

<x-ads.top-banner />

<div class="single-page-sec">
    <div class="single-page-icon"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="33.334" viewBox="0 0 30 33.334"><path id="Path_26" data-name="Path 26" d="M-4301.5-156a5,5,0,0,1-5-5v-23.333a5,5,0,0,1,5-5h13.333a11.667,11.667,0,0,1,11.667,11.667V-161a5,5,0,0,1-5,5Zm-1.667-28.333V-161a1.667,1.667,0,0,0,1.667,1.667h20a1.668,1.668,0,0,0,1.667-1.667v-16.667h-10V-186H-4301.5A1.666,1.666,0,0,0-4303.166-184.333ZM-4286.5-181h5.974a8.349,8.349,0,0,0-5.974-4.833Zm-14,19.333v-1.493h17.908v1.493Zm0-3.234v-1.492h17.908v1.492Zm1.493-3.233a1.492,1.492,0,0,1-1.493-1.493V-174.1a1.492,1.492,0,0,1,1.493-1.493h14.922a1.492,1.492,0,0,1,1.493,1.493v4.477a1.492,1.492,0,0,1-1.493,1.493Zm0-1.493h14.922V-174.1h-14.922Z" transform="translate(4306.5 189.334)" fill="#4c3ff2"/></svg></div>
    <h1 class="single-page-main-title">{{ $page->title }}</h1>
    <p class="single-page-main-desc">{{ $page->description }}</p>
    
    <div class="single-page-inner">
        {!! $page->content !!}
    </div>
</div>

<x-ads.bottom-banner />

@endsection