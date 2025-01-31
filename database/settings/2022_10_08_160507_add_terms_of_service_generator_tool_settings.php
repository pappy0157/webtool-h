<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddTermsOfServiceGeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-terms-of-service-generator.enabled', TRUE);
        $this->migrator->add('tool-terms-of-service-generator.title', 'Terms of Service Generator');
        $this->migrator->add('tool-terms-of-service-generator.summary', 'Generate TOS for your website.');
        $this->migrator->add('tool-terms-of-service-generator.description', 'Terms of Service Generator is a useful tool that helps you generate Terms of Service pages for your website based on a specific template.');
    
        $this->migrator->add("tool-terms-of-service-generator.metaDescription", "Terms of Service Generator is a useful tool that helps you generate Terms of Service pages for your website based on a specific template.");
        $this->migrator->add("tool-terms-of-service-generator.metaKeywords", "");

        $this->migrator->add('tool-slugs.TermsOfServiceGenerator', 'terms-of-service-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-terms-of-service-generator.enabled');
        $this->migrator->delete('tool-terms-of-service-generator.title');
        $this->migrator->delete('tool-terms-of-service-generator.summary');
        $this->migrator->delete('tool-terms-of-service-generator.description');

        $this->migrator->delete('tool-terms-of-service-generator.metaDescription');
        $this->migrator->delete('tool-terms-of-service-generator.metaKeywords');

        $this->migrator->delete('tool-slugs.TermsOfServiceGenerator');
    }
}
