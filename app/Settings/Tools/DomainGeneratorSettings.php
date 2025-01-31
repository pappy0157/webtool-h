<?php

namespace App\Settings\Tools;

class DomainGeneratorSettings extends BaseToolSetting {
    public string $affiliateUrl;

    public static function group(): string {
        return 'tool-domain-generator';
    }
}