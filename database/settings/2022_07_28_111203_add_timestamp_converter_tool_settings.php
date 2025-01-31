<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddTimestampConverterToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-timestamp-converter.enabled', TRUE);
        $this->migrator->add('tool-timestamp-converter.title', 'Timestamp Converter');
        $this->migrator->add('tool-timestamp-converter.summary', 'Convert to & from UNIX Timestamps.');
        $this->migrator->add('tool-timestamp-converter.description', 'Timestamp Converter is a useful tool that allows you to convert timestamps to dates and vice versa. The UNIX timestamp is the amount of seconds passed since Jan 1st, 1970 UTC.');
    
        $this->migrator->add('tool-slugs.TimestampConverter', 'timestamp-converter');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-timestamp-converter.enabled');
        $this->migrator->delete('tool-timestamp-converter.title');
        $this->migrator->delete('tool-timestamp-converter.summary');
        $this->migrator->delete('tool-timestamp-converter.description');

        $this->migrator->delete('tool-slugs.TimestampConverter');
    }
}
