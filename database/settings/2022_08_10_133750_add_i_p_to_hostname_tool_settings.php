<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddIPToHostnameToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-ip-to-hostname.enabled', TRUE);
        $this->migrator->add('tool-ip-to-hostname.title', 'IP To Hostname');
        $this->migrator->add('tool-ip-to-hostname.summary', 'Get Hostname from any IP Address');
        $this->migrator->add('tool-ip-to-hostname.description', 'IP To Hostname is a useful tool that allows you to find out the hostname from an IP Address. Simply type in your IP Address and Click on the Button to find the hostname.');
    
        $this->migrator->add('tool-slugs.IPToHostname', 'ip-to-hostname');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-ip-to-hostname.enabled');
        $this->migrator->delete('tool-ip-to-hostname.title');
        $this->migrator->delete('tool-ip-to-hostname.summary');
        $this->migrator->delete('tool-ip-to-hostname.description');

        $this->migrator->delete('tool-slugs.IPToHostname');
    }
}
