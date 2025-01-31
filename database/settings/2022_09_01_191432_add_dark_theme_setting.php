<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddDarkThemeSetting extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.darkTheme', false);
        $this->migrator->add('general.defaultTheme', 'light');
    }

    public function down(): void {
        $this->migrator->delete('general.darkTheme');
        $this->migrator->delete('general.defaultTheme');
    }
}
