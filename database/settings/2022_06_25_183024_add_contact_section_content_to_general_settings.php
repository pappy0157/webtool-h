<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddContactSectionContentToGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.contactSectionContent', '<h3>Contact</h3><h2>Missing something?</h2><p>Feel free to request missing tools or give some feedback using our contact form.</p>');
    }

    public function down() : void
    {
        $this->migrator->delete('general.contactSectionContent');
    }
}
