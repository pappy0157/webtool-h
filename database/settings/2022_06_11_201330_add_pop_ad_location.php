<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddPopAdLocation extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('ads.popAdLocation', 'header');
    }

    public function down(): void {
        $this->migrator->delete('ads.popAdLocation');
    }
}
