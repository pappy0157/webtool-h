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
                <label for="height" class="custom-label">{{ trans('webtools/tools/bmi-calculator.label_height') }}</label>
                <div class="d-flex">
                    <input type="number" name="height" id="height" class="custom-input w-100" value="{{ request()->input('height') }}" required>
                    <select class="form-select custom-input w-auto pe-5 ms-3" name="heightUnit">
                        <option value="centimeter">{{ trans('webtools/tools/bmi-calculator.opt_centimeter') }}</option>
                        <option value="inch">{{ trans('webtools/tools/bmi-calculator.opt_inch') }}</option>
                        <option value="foot" selected="">{{ trans('webtools/tools/bmi-calculator.opt_foot') }}</option>
                        <option value="meter">{{ trans('webtools/tools/bmi-calculator.opt_meter') }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="weight" class="custom-label">{{ trans('webtools/tools/bmi-calculator.label_weight') }}</label>
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <input type="number" name="weight" id="weight" class="custom-input w-100" value="{{ request()->input('weight') }}" required>
                    </div>
                    <select class="form-select custom-input w-auto pe-5 ms-3" name="weightUnit">
                        <option value="kilogram" selected="">{{ trans('webtools/tools/bmi-calculator.opt_kilogram') }}</option>
                        <option value="pound">{{ trans('webtools/tools/bmi-calculator.opt_pound') }}</option>
                    </select>
                </div>
            </div>

            <input type="hidden" name="submit" value="true">
            <button class="btn custom--btn button__lg">{{ trans('webtools/tools/bmi-calculator.submit') }}</button>
            @if (request()->input('submit'))
                @if ($error == true)
                    <div class="alert alert-danger rounded-pill mt-3 p-l-25 p-r-25 bg-danger border-0"><h5 class="m-0 text-light">{{ trans('webtools/tools/bmi-calculator.msg_required') }}</h5></div>
                @endif
                @if ($m_number == true)
                    <div class="alert alert-success rounded-pill mt-3 p-l-25 p-r-25 bg-success border-0"><h5 class="m-0 text-light">{{ trans('webtools/tools/bmi-calculator.msg_only_number') }}</h5></div>
                @endif

                @if ($error != true && $m_number != true)
                    @if ($BMIIndex < 18.5)
                        <div class="alert alert-warning rounded-pill mt-3 p-l-25 p-r-25 bg-warning border-0"><h5 class="m-0 text-light fs-4">{{ trans('webtools/tools/bmi-calculator.ur_bmi_is') }} {{ $BMIIndex }} {{ trans('webtools/tools/bmi-calculator.and_u_r') }} {{ trans('webtools/tools/bmi-calculator.msg_under_weight') }}</h5></div>
                            @elseif ($BMIIndex <= 24.9)
                                <div class="alert alert-success rounded-pill mt-3 p-l-25 p-r-25 bg-success border-0"><h5 class="m-0 text-light fs-4">{{ trans('webtools/tools/bmi-calculator.ur_bmi_is') }} {{ $BMIIndex }} {{ trans('webtools/tools/bmi-calculator.and_u_r') }} {{ trans('webtools/tools/bmi-calculator.msg_normal') }}</h5></div>
                            @elseif ($BMIIndex <= 29.9)
                                <div class="alert alert-primary rounded-pill mt-3 p-l-25 p-r-25 bg-primary border-0"><h5 class="m-0 text-light fs-4">{{ trans('webtools/tools/bmi-calculator.ur_bmi_is') }} {{ $BMIIndex }} {{ trans('webtools/tools/bmi-calculator.and_u_r') }} {{ trans('webtools/tools/bmi-calculator.msg_over_weight') }}</h5></div>
                            @else
                                <div class="alert alert-info rounded-pill mt-3 p-l-25 p-r-25 bg-info border-0"><h5 class="m-0 text-dark fs-4">{{ trans('webtools/tools/bmi-calculator.ur_bmi_is') }} {{ $BMIIndex }} {{ trans('webtools/tools/bmi-calculator.and_u_r') }} {{ trans('webtools/tools/bmi-calculator.msg_obese') }}</h5></div>
                    @endif
                @endif
            @endif
        </form>

        <hr class="small-marg">
        <h2>{{ trans('webtools/tools/bmi-calculator.bmi_cat_title') }}</h2>
        <p>
            {{ trans('webtools/tools/bmi-calculator.msg_under_weight') }} = < 18.5 <br>
            {{ trans('webtools/tools/bmi-calculator.msg_normal') }} = 18.5–24.9 <br>
            {{ trans('webtools/tools/bmi-calculator.msg_over_weight') }} = 25–29.9 <br>
            {{ trans('webtools/tools/bmi-calculator.msg_obese') }} = {{ trans('webtools/tools/bmi-calculator.bmi_greater') }}
        </p>
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

