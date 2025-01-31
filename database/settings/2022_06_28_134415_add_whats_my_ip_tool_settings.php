<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddWhatsMyIpToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-whats-my-ip.enabled', TRUE);
        $this->migrator->add('tool-whats-my-ip.title', 'Whats My IP');
        $this->migrator->add('tool-whats-my-ip.summary', 'Find out your IP Address.');
        $this->migrator->add('tool-whats-my-ip.description', 'Whats My IP is a useful tool that helps you easily find your IP address.');
    
        $this->migrator->add('tool-slugs.WhatsMyIp', 'whats-my-ip');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-whats-my-ip.enabled');
        $this->migrator->delete('tool-whats-my-ip.title');
        $this->migrator->delete('tool-whats-my-ip.summary');
        $this->migrator->delete('tool-whats-my-ip.description');

        $this->migrator->delete('tool-slugs.WhatsMyIp');
    }
}
