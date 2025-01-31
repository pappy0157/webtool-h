<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddContactPageFieldToGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.contactPage', true);
    }

    public function down() {
        $this->migrator->delete('general.contactPage');
    }
}
