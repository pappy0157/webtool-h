<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddNewGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('toolpage.showRelatedTools', FALSE);
    }

    
    public function down(): void {
        $this->migrator->delete('toolpage.showRelatedTools');
    }
}
