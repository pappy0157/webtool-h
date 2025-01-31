<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddHostnameToIPToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-hostname-to-ip.enabled', TRUE);
        $this->migrator->add('tool-hostname-to-ip.title', 'Hostname To IP');
        $this->migrator->add('tool-hostname-to-ip.summary', 'Get IP Address from a Hostname');
        $this->migrator->add('tool-hostname-to-ip.description', 'Hostname to IP is a useful tool that allows you to find out the IP Address from a Hostname. Just type in your Hostname and Click on the Button to find the IP Address.');
    
        $this->migrator->add('tool-slugs.HostnameToIP', 'hostname-to-ip');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-hostname-to-ip.enabled');
        $this->migrator->delete('tool-hostname-to-ip.title');
        $this->migrator->delete('tool-hostname-to-ip.summary');
        $this->migrator->delete('tool-hostname-to-ip.description');

        $this->migrator->delete('tool-slugs.HostnameToIP');
    }
}
