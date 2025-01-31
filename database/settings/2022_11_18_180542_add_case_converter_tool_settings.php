<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddCaseConverterToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-case-converter.enabled', TRUE);
        $this->migrator->add('tool-case-converter.title', 'Case Converter');
        $this->migrator->add('tool-case-converter.summary', 'Change the case of text.');
        $this->migrator->add('tool-case-converter.description', 'Case Converter is a useful tool that helps you modify the casing of any piece of text.');
    
        $this->migrator->add("tool-case-converter.metaDescription", "Case Converter is a useful tool that helps you modify the casing of any piece of text.");
        $this->migrator->add("tool-case-converter.metaKeywords", "");

        $this->migrator->add('tool-slugs.CaseConverter', 'case-converter');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-case-converter.enabled');
        $this->migrator->delete('tool-case-converter.title');
        $this->migrator->delete('tool-case-converter.summary');
        $this->migrator->delete('tool-case-converter.description');

        $this->migrator->delete('tool-case-converter.metaDescription');
        $this->migrator->delete('tool-case-converter.metaKeywords');

        $this->migrator->delete('tool-slugs.CaseConverter');
    }
}
