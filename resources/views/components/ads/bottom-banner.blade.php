@if($adSettings->bottomBannerStatus)
    <x-ads.banner :code="$adSettings->bottomBannerCode" />
@endif