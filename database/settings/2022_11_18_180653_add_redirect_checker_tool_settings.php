<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddRedirectCheckerToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-redirect-checker.enabled', TRUE);
        $this->migrator->add('tool-redirect-checker.title', 'Redirect Checker');
        $this->migrator->add('tool-redirect-checker.summary', 'Checker whether a URL has a Redirect.');
        $this->migrator->add('tool-redirect-checker.description', 'Redirect Checker is a useful tool that helps you check whether a URL has a redirect or not.');
    
        $this->migrator->add("tool-redirect-checker.metaDescription", "Redirect Checker is a useful tool that helps you check whether a URL has a redirect or not.");
        $this->migrator->add("tool-redirect-checker.metaKeywords", "");

        $this->migrator->add('tool-slugs.RedirectChecker', 'redirect-checker');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-redirect-checker.enabled');
        $this->migrator->delete('tool-redirect-checker.title');
        $this->migrator->delete('tool-redirect-checker.summary');
        $this->migrator->delete('tool-redirect-checker.description');

        $this->migrator->delete('tool-redirect-checker.metaDescription');
        $this->migrator->delete('tool-redirect-checker.metaKeywords');

        $this->migrator->delete('tool-slugs.RedirectChecker');
    }
}
