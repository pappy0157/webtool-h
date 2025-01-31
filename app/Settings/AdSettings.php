<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AdSettings extends Settings {
    public ?bool   $popAdStatus;
    public ?string $popAdLocation;
    public ?string $popAdCode;

    public ?bool   $topBannerStatus;
    public ?string $topBannerCode;

    public ?bool   $middleBannerStatus;
    public ?string $middleBannerCode;

    public ?bool   $bottomBannerStatus;
    public ?string $bottomBannerCode;

    public static function group(): string {
        return 'ads';
    }
}