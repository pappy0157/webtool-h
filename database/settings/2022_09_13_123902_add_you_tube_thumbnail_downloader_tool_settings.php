<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddYouTubeThumbnailDownloaderToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-youtube-thumbnail-downloader.enabled', TRUE);
        $this->migrator->add('tool-youtube-thumbnail-downloader.title', 'YouTube Thumbnail Downloader');
        $this->migrator->add('tool-youtube-thumbnail-downloader.summary', 'Download YouTube Thumbnails');
        $this->migrator->add('tool-youtube-thumbnail-downloader.description', 'YouTube Thumbnail Downloader is a useful tool that helps you download YouTube Thumbnails.');
    
        $this->migrator->add("tool-youtube-thumbnail-downloader.metaDescription", "YouTube Thumbnail Downloader is a useful tool that helps you download YouTube Thumbnails.");
        $this->migrator->add("tool-youtube-thumbnail-downloader.metaKeywords", "");

        $this->migrator->add('tool-slugs.YouTubeThumbnailDownloader', 'youtube-thumbnail-downloader');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-youtube-thumbnail-downloader.enabled');
        $this->migrator->delete('tool-youtube-thumbnail-downloader.title');
        $this->migrator->delete('tool-youtube-thumbnail-downloader.summary');
        $this->migrator->delete('tool-youtube-thumbnail-downloader.description');

        $this->migrator->delete('tool-youtube-thumbnail-downloader.metaDescription');
        $this->migrator->delete('tool-youtube-thumbnail-downloader.metaKeywords');

        $this->migrator->delete('tool-slugs.YouTubeThumbnailDownloader');
    }
}