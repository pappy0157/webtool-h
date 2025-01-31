<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddIPInformationToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-ip-information.enabled', TRUE);
        $this->migrator->add('tool-ip-information.title', 'IP Information');
        $this->migrator->add('tool-ip-information.summary', 'Get information about any IP');
        $this->migrator->add('tool-ip-information.description', 'IP Information is a useful tool that allows you to get the information about any IP Address.');
    
        $this->migrator->add("tool-ip-information.metaDescription", "IP Information is a useful tool that allows you to get the information about any IP Address.");
        $this->migrator->add("tool-ip-information.metaKeywords", "");

        $this->migrator->add('tool-slugs.IPInformation', 'ip-information');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-ip-information.enabled');
        $this->migrator->delete('tool-ip-information.title');
        $this->migrator->delete('tool-ip-information.summary');
        $this->migrator->delete('tool-ip-information.description');

        $this->migrator->delete('tool-ip-information.metaDescription');
        $this->migrator->delete('tool-ip-information.metaKeywords');

        $this->migrator->delete('tool-slugs.IPInformation');
    }
}
