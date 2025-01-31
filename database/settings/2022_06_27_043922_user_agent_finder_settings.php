<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class UserAgentFinderSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-user-agent-finder.enabled', TRUE);
        $this->migrator->add('tool-user-agent-finder.title', 'User Agent Finder');
        $this->migrator->add('tool-user-agent-finder.summary', 'Find out your user agent.');
        $this->migrator->add('tool-user-agent-finder.description', 'User Agent Finder is a useful tool that helps you easily find the user agent for your browser.');
    
        $this->migrator->add('tool-slugs.UserAgentFinder', 'user-agent-finder');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-user-agent-finder.enabled');
        $this->migrator->delete('tool-user-agent-finder.title');
        $this->migrator->delete('tool-user-agent-finder.summary');
        $this->migrator->delete('tool-user-agent-finder.description');

        $this->migrator->delete('tool-slugs.UserAgentFinder');
    }
}