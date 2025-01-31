<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddURLUnshortenerToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-url-unshortener.enabled', TRUE);
        $this->migrator->add('tool-url-unshortener.title', 'URL Unshortener');
        $this->migrator->add('tool-url-unshortener.summary', 'Unshorten a URL and find the original.');
        $this->migrator->add('tool-url-unshortener.description', 'URL Unshortener is a useful tool that allows you to unshorten a URL / Link that has been shortened by URL shortening services. This method will not work for services that have a delay before the original location.');
    
        $this->migrator->add('tool-slugs.URLUnshortener', 'url-unshortener');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-url-unshortener.enabled');
        $this->migrator->delete('tool-url-unshortener.title');
        $this->migrator->delete('tool-url-unshortener.summary');
        $this->migrator->delete('tool-url-unshortener.description');

        $this->migrator->delete('tool-slugs.URLUnshortener');
    }
}
