<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddServersToDomainWhoisSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-domain-whois.servers', []);
    }

    public function down(): void
    {
        $this->migrator->delete('tool-domain-whois.servers');
    }
}
