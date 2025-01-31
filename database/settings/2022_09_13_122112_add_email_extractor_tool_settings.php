<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddEmailExtractorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-email-extractor.enabled', TRUE);
        $this->migrator->add('tool-email-extractor.title', 'E-Mail Extractor');
        $this->migrator->add('tool-email-extractor.summary', 'Extract E-Mails from Text');
        $this->migrator->add('tool-email-extractor.description', 'E-Mail extractor is a useful tool that allows you to extract email addresses from text.');
    
        $this->migrator->add("tool-email-extractor.metaDescription", "E-Mail extractor is a useful tool that allows you to extract email addresses from text.");
        $this->migrator->add("tool-email-extractor.metaKeywords", "");

        $this->migrator->add('tool-slugs.EmailExtractor', 'email-extractor');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-email-extractor.enabled');
        $this->migrator->delete('tool-email-extractor.title');
        $this->migrator->delete('tool-email-extractor.summary');
        $this->migrator->delete('tool-email-extractor.description');

        $this->migrator->delete('tool-email-extractor.metaDescription');
        $this->migrator->delete('tool-email-extractor.metaKeywords');

        $this->migrator->delete('tool-slugs.EmailExtractor');
    }
}
