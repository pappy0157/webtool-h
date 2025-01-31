@extends('layouts.main')

@section('content')

<div class="single-page-sec">
                
    <div class="single-page-inner">
        <h1 class="pages-title">Payment Successful</h1>
        <p class="pages-desc">You successfully subscribed to the premium plan. Your account status will be updated shortly.</p>
        <div class="checkoutSuccess-btns-section">
            <a class="btn custom--btn button__lg" href="{{ url('/') }}">Homepage</a>
            <a class="btn custom--btn button__lg btn__bordered" href="{{ route('manage') }}">Your Account</a>
        </div>
    </div>
</div>

@endsection