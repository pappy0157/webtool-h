<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddOpenPortCheckerToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-open-port-checker.enabled', TRUE);
        $this->migrator->add('tool-open-port-checker.title', 'Open Port Checker');
        $this->migrator->add('tool-open-port-checker.summary', 'The open port checker is a tool you can use to check your external IP address and detect open ports on your connection.');
        $this->migrator->add('tool-open-port-checker.description', 'The open port checker is a tool you can use to check your external IP address and detect open ports on your connection.');

        $this->migrator->add("tool-open-port-checker.metaDescription", "The open port checker is a tool you can use to check your external IP address and detect open ports on your connection.");
        $this->migrator->add("tool-open-port-checker.metaKeywords", "");

        $this->migrator->add('tool-slugs.OpenPortChecker', 'open-port-checker');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-open-port-checker.enabled');
        $this->migrator->delete('tool-open-port-checker.title');
        $this->migrator->delete('tool-open-port-checker.summary');
        $this->migrator->delete('tool-open-port-checker.description');

        $this->migrator->delete('tool-open-port-checker.metaDescription');
        $this->migrator->delete('tool-open-port-checker.metaKeywords');

        $this->migrator->delete('tool-slugs.OpenPortChecker');
    }
}
