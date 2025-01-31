<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SassFeatures extends Settings {
    public ?bool $status;
    public ?float $premiumPriceMonthly;
    public ?float $premiumPriceAnnually;

    public ?string $stripePublic;
    public ?string $stripePrivate;
    // public ?string $stripeMonthlyItem;
    // public ?string $stripeYearlyItem;

    public ?string $googleClientId;
    public ?string $googleClientSecret;

    public ?array $premiumTools;

    public static function group(): string {
        return 'sass';
    }
}