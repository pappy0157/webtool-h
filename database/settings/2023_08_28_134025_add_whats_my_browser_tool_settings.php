<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddWhatsMyBrowserToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-whats-my-browser.enabled', TRUE);
        $this->migrator->add('tool-whats-my-browser.title', 'What is My Browser');
        $this->migrator->add('tool-whats-my-browser.summary', 'What browser do I have? Find out my browser.');
        $this->migrator->add('tool-whats-my-browser.description', 'What browser do I have? Find out my browser.');

        $this->migrator->add("tool-whats-my-browser.metaDescription", "What browser do I have? Find out my browser.");
        $this->migrator->add("tool-whats-my-browser.metaKeywords", "");

        $this->migrator->add('tool-slugs.WhatsMyBrowser', 'whats-my-browser');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-whats-my-browser.enabled');
        $this->migrator->delete('tool-whats-my-browser.title');
        $this->migrator->delete('tool-whats-my-browser.summary');
        $this->migrator->delete('tool-whats-my-browser.description');

        $this->migrator->delete('tool-whats-my-browser.metaDescription');
        $this->migrator->delete('tool-whats-my-browser.metaKeywords');

        $this->migrator->delete('tool-slugs.WhatsMyBrowser');
    }
}
