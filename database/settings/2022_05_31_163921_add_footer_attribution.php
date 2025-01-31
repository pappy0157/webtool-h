<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddFooterAttribution extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.footerAttribution', '&copy; Webtools. All Rights Reserved.');
    }

    public function down(): void {
        $this->migrator->delete('general.footerAttribution');
    }
}
