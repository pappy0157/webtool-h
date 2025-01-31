@if($adSettings->middleBannerStatus)
    <x-ads.banner :code="$adSettings->middleBannerCode" />
@endif