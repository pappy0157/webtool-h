<?php

namespace App\Settings\Tools;

class DomainWhoisSettings extends BaseToolSetting {
    public ?array $servers;

    public static function group(): string {
        return 'tool-domain-whois';
    }
}