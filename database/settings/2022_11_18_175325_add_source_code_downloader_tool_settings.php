<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddSourceCodeDownloaderToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-source-code-downloader.enabled', TRUE);
        $this->migrator->add('tool-source-code-downloader.title', 'Source Code Downloader');
        $this->migrator->add('tool-source-code-downloader.summary', 'Download any webpage\'s source code');
        $this->migrator->add('tool-source-code-downloader.description', 'Source code downloader is a useful tool that lets you download the source code of any webpage.');
    
        $this->migrator->add("tool-source-code-downloader.metaDescription", "Source code downloader is a useful tool that lets you download the source code of any webpage.");
        $this->migrator->add("tool-source-code-downloader.metaKeywords", "");

        $this->migrator->add('tool-slugs.SourceCodeDownloader', 'source-code-downloader');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-source-code-downloader.enabled');
        $this->migrator->delete('tool-source-code-downloader.title');
        $this->migrator->delete('tool-source-code-downloader.summary');
        $this->migrator->delete('tool-source-code-downloader.description');

        $this->migrator->delete('tool-source-code-downloader.metaDescription');
        $this->migrator->delete('tool-source-code-downloader.metaKeywords');

        $this->migrator->delete('tool-slugs.SourceCodeDownloader');
    }
}
