<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddURLExtractorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-url-extractor.enabled', TRUE);
        $this->migrator->add('tool-url-extractor.title', 'URL Extractor');
        $this->migrator->add('tool-url-extractor.summary', 'Extract URLs from Text');
        $this->migrator->add('tool-url-extractor.description', 'URL extractor is a useful tool that allows you to extract URLs from text.');
    
        $this->migrator->add("tool-url-extractor.metaDescription", "URL extractor is a useful tool that allows you to extract URLs from text.");
        $this->migrator->add("tool-url-extractor.metaKeywords", "");

        $this->migrator->add('tool-slugs.URLExtractor', 'url-extractor');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-url-extractor.enabled');
        $this->migrator->delete('tool-url-extractor.title');
        $this->migrator->delete('tool-url-extractor.summary');
        $this->migrator->delete('tool-url-extractor.description');

        $this->migrator->delete('tool-url-extractor.metaDescription');
        $this->migrator->delete('tool-url-extractor.metaKeywords');

        $this->migrator->delete('tool-slugs.URLExtractor');
    }
}
