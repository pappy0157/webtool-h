<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddLinksFieldToGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.links', []);
    }

    public function down(): void {
        $this->migrator->delete('general.links');
    }
}
