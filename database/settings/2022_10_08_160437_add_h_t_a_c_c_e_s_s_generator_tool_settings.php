<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddHTACCESSGeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-htaccess-redirect-generator.enabled', TRUE);
        $this->migrator->add('tool-htaccess-redirect-generator.title', 'HTACCESS Redirect Generator');
        $this->migrator->add('tool-htaccess-redirect-generator.summary', 'Generate HTACCESS Redirects');
        $this->migrator->add('tool-htaccess-redirect-generator.description', 'HTACCESS Redirect Generator is a useful tool that helps you generate HTACESS files to handle redirects. HTACCESS files work on Apache and Apache Compatible Web Servers.');
    
        $this->migrator->add("tool-htaccess-redirect-generator.metaDescription", "HTACCESS Redirect Generator is a useful tool that helps you generate HTACESS files to handle redirects. HTACCESS files work on Apache and Apache Compatible Web Servers.");
        $this->migrator->add("tool-htaccess-redirect-generator.metaKeywords", "");

        $this->migrator->add('tool-slugs.HTACCESSRedirectGenerator', 'htaccess-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-htaccess-redirect-generator.enabled');
        $this->migrator->delete('tool-htaccess-redirect-generator.title');
        $this->migrator->delete('tool-htaccess-redirect-generator.summary');
        $this->migrator->delete('tool-htaccess-redirect-generator.description');

        $this->migrator->delete('tool-htaccess-redirect-generator.metaDescription');
        $this->migrator->delete('tool-htaccess-redirect-generator.metaKeywords');

        $this->migrator->delete('tool-slugs.HTACCESSRedirectGenerator');
    }
}
