<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddPrivacyPolicyGeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-privacy-policy-generator.enabled', TRUE);
        $this->migrator->add('tool-privacy-policy-generator.title', 'Privacy Policy Generator');
        $this->migrator->add('tool-privacy-policy-generator.summary', 'Generate Privacy Policy pages for your website.');
        $this->migrator->add('tool-privacy-policy-generator.description', 'Privacy Policy Generator is a useful tool that helps you generate Privacy Policy pages for your website based on a specific template.');
    
        $this->migrator->add("tool-privacy-policy-generator.metaDescription", "Privacy Policy Generator is a useful tool that helps you generate Privacy Policy pages for your website based on a specific template.");
        $this->migrator->add("tool-privacy-policy-generator.metaKeywords", "");

        $this->migrator->add('tool-slugs.PrivacyPolicyGenerator', 'privacy-policy-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-privacy-policy-generator.enabled');
        $this->migrator->delete('tool-privacy-policy-generator.title');
        $this->migrator->delete('tool-privacy-policy-generator.summary');
        $this->migrator->delete('tool-privacy-policy-generator.description');

        $this->migrator->delete('tool-privacy-policy-generator.metaDescription');
        $this->migrator->delete('tool-privacy-policy-generator.metaKeywords');

        $this->migrator->delete('tool-slugs.PrivacyPolicyGenerator');
    }
}
