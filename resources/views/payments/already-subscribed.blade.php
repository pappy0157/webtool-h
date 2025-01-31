@extends('layouts.main')

@section('content')

<div class="single-page-sec">
                
    <div class="single-page-inner">
        <h1 class="pages-title">Already Subscribed</h1>
        <p class="pages-desc">You have already subscribed to the premium plan. Thank you for your support.</p>
        <div class="checkoutSuccess-btns-section">
            <a class="btn custom--btn button__lg" href="{{ route('manage') }}">Account</a>
        </div>
    </div>
</div>

@endsection