<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddURLPaserToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-url-parser.enabled', TRUE);
        $this->migrator->add('tool-url-parser.title', 'URL Parser');
        $this->migrator->add('tool-url-parser.summary', 'Parse and extract details from URL.');
        $this->migrator->add('tool-url-parser.description', 'URL Parser is a useful tool that helps you parse and extract details from a URL.');
    
        $this->migrator->add("tool-url-parser.metaDescription", "URL Parser is a useful tool that helps you parse and extract details from a URL.");
        $this->migrator->add("tool-url-parser.metaKeywords", "");

        $this->migrator->add('tool-slugs.URLParser', 'url-parser');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-url-parser.enabled');
        $this->migrator->delete('tool-url-parser.title');
        $this->migrator->delete('tool-url-parser.summary');
        $this->migrator->delete('tool-url-parser.description');

        $this->migrator->delete('tool-url-parser.metaDescription');
        $this->migrator->delete('tool-url-parser.metaKeywords');

        $this->migrator->delete('tool-slugs.URLParser');
    }
}
