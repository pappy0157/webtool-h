<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddSEOTagsGeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-seo-tags-generator.enabled', TRUE);
        $this->migrator->add('tool-seo-tags-generator.title', 'SEO Tags Generator');
        $this->migrator->add('tool-seo-tags-generator.summary', 'Generate SEO & OpenGraph tags for your website.');
        $this->migrator->add('tool-seo-tags-generator.description', 'SEO & OpenGraph Tags Generator is a tool that lets you generate proper SEO & OpenGraph tags for your websites which make sure your website is indexed properly by search engines & social networks.');
    
        $this->migrator->add('tool-slugs.SEOTagsGenerator', 'seo-tags-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-seo-tags-generator.enabled');
        $this->migrator->delete('tool-seo-tags-generator.title');
        $this->migrator->delete('tool-seo-tags-generator.summary');
        $this->migrator->delete('tool-seo-tags-generator.description');

        $this->migrator->delete('tool-slugs.SEOTagsGenerator');
    }
}