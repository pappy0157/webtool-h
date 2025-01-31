<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SMTPSettings extends Settings {
    public ?bool $enabled;
    public ?string $host;
    public ?string $port;
    public ?string $username;
    public ?string $password;
    public ?string $encryption;
    public ?string $from;
    public ?string $name;

    public static function group(): string {
        return 'smtp';
    }
}