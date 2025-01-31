<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddPingToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-ping.enabled', TRUE);
        $this->migrator->add('tool-ping.title', 'Ping');
        $this->migrator->add('tool-ping.summary', 'Measure Ping for any Address.');
        $this->migrator->add('tool-ping.description', 'Ping any web server and measure the latency. The latency is the total time elapsed for the Client and the Server to send and receive data from each other. Simply type in your Address and click on the button.');
    
        $this->migrator->add('tool-slugs.Ping', 'ping');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-ping.enabled');
        $this->migrator->delete('tool-ping.title');
        $this->migrator->delete('tool-ping.summary');
        $this->migrator->delete('tool-ping.description');

        $this->migrator->delete('tool-slugs.Ping');
    }
}
