@if($adSettings->topBannerStatus)
    <x-ads.banner :code="$adSettings->topBannerCode" />
@endif