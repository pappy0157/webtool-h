<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddSEOKeywords extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.websiteKeywords', 'web tools, cyber tools, converters, calculators, utilities, tools');
        $this->migrator->add('general.contactDescription', 'Contact Us to talk about suggestions, updates or business related queries.');
    }

    public function down(): void {
        $this->migrator->delete('general.websiteKeywords');
        $this->migrator->delete('general.contactDescription');
    }
}
