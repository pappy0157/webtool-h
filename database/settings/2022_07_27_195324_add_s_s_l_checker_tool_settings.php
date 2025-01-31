<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddSSLCheckerToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-ssl-checker.enabled', TRUE);
        $this->migrator->add('tool-ssl-checker.title', 'SSL Checker');
        $this->migrator->add('tool-ssl-checker.summary', 'Verify SSL Certificate of any website.');
        $this->migrator->add('tool-ssl-checker.description', 'SSL Checker is a useful tool that allows you to check if the SSL Certificate of any website is valid.');
    
        $this->migrator->add('tool-slugs.SSLChecker', 'ssl-checker');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-ssl-checker.enabled');
        $this->migrator->delete('tool-ssl-checker.title');
        $this->migrator->delete('tool-ssl-checker.summary');
        $this->migrator->delete('tool-ssl-checker.description');

        $this->migrator->delete('tool-slugs.SSLChecker');
    }
}
