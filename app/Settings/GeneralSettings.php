<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings {
    public ?string $websiteTitle;
    public ?string $websiteDescription;
    public ?string $websiteKeywords;
    public ?string $footerAttribution;

    public ?string $logo;
    public ?string $footerLogo;
    public ?string $favicon;
    public ?string $ogImage;
    public ?bool   $darkTheme;
    public ?string $defaultTheme;

    public ?bool   $contactPage;
    public ?string $contactTitle;
    public ?string $contactKeywords;
    public ?string $contactDescription;

    public ?bool   $blogSection;
    public ?string $blogTitle;
    public ?string $blogKeywords;
    public ?string $blogDescription;

    public ?array $links;
    public ?array $styles;
    public ?array $scripts;

    public ?string $customStyles;
    public ?string $headerTags;
    public ?string $bodyTags;
    public ?string $gaId;

    public ?bool   $recaptchaEnabled;
    public ?string $recaptchaSiteKey;
    public ?string $recaptchaSecretKey;

    public ?string $contactSectionContent;

    public static function group(): string {
        return 'general';
    }
}