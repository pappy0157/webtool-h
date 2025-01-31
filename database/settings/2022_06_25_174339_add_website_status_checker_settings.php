<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddWebsiteStatusCheckerSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-website-status-checker.enabled', TRUE);
        $this->migrator->add('tool-website-status-checker.title', 'Website Status Checker');
        $this->migrator->add('tool-website-status-checker.summary', 'Check whether a website is online or not.');
        $this->migrator->add('tool-website-status-checker.description', 'Website Status Checker is a useful tool that helps you check whether any website is up and running or not. You can use it to check the up-status of your own website or any other website.');
    
        $this->migrator->add('tool-slugs.WebsiteStatusChecker', 'website-status-checker');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-website-status-checker.enabled');
        $this->migrator->delete('tool-website-status-checker.title');
        $this->migrator->delete('tool-website-status-checker.summary');
        $this->migrator->delete('tool-website-status-checker.description');

        $this->migrator->delete('tool-slugs.WebsiteStatusChecker');
    }
}
