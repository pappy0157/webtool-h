<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddHTTPStatusCodeCheckerToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-http-status-code-checker.enabled', TRUE);
        $this->migrator->add('tool-http-status-code-checker.title', 'HTTP Status Code Checker');
        $this->migrator->add('tool-http-status-code-checker.summary', 'Check HTTP Status Codes from URLs');
        $this->migrator->add('tool-http-status-code-checker.description', 'HTTP Status Code Checker checker is a useful tool that lets you determine http response status codes from any URL.');
    
        $this->migrator->add("tool-http-status-code-checker.metaDescription", "HTTP Status Code Checker checker is a useful tool that lets you determine http response status codes from any URL.");
        $this->migrator->add("tool-http-status-code-checker.metaKeywords", "");

        $this->migrator->add('tool-slugs.HTTPStatusCodeChecker', 'http-status-code-checker');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-http-status-code-checker.enabled');
        $this->migrator->delete('tool-http-status-code-checker.title');
        $this->migrator->delete('tool-http-status-code-checker.summary');
        $this->migrator->delete('tool-http-status-code-checker.description');

        $this->migrator->delete('tool-http-status-code-checker.metaDescription');
        $this->migrator->delete('tool-http-status-code-checker.metaKeywords');

        $this->migrator->delete('tool-slugs.HTTPStatusCodeChecker');
    }
}
