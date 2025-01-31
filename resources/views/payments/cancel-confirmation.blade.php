@extends('layouts.main')

@section('content')

<div class="single-page-sec">
                
    <div class="single-page-inner">
        <h1 class="pages-title">Are you sure?</h1>
        <p class="pages-desc">By cancelling your subscription, you will lose access to all Premium Tools as-well as any ones that may be added in the future.</p>
        <div class="checkoutSuccess-btns-section">
            <a class="btn custom--btn button__lg" href="{{ route('manage') }}">No</a>
            <a class="btn custom--btn button__lg btn__bordered" href="{{ route('cancel.current.subscription') }}">Yes</a>
        </div>
    </div>
</div>

@endsection