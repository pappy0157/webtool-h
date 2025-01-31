<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddTextToSlugToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-text-to-slug.enabled', TRUE);
        $this->migrator->add('tool-text-to-slug.title', 'Text To Slug');
        $this->migrator->add('tool-text-to-slug.summary', 'Convert Text to Slug / Permalink.');
        $this->migrator->add('tool-text-to-slug.description', 'Text to Slug is a useful tool that helps you convert text to slugs.');
    
        $this->migrator->add("tool-text-to-slug.metaDescription", "Text to Slug is a useful tool that helps you convert text to slugs.");
        $this->migrator->add("tool-text-to-slug.metaKeywords", "");

        $this->migrator->add('tool-slugs.TextToSlug', 'text-to-slug');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-text-to-slug.enabled');
        $this->migrator->delete('tool-text-to-slug.title');
        $this->migrator->delete('tool-text-to-slug.summary');
        $this->migrator->delete('tool-text-to-slug.description');

        $this->migrator->delete('tool-text-to-slug.metaDescription');
        $this->migrator->delete('tool-text-to-slug.metaKeywords');

        $this->migrator->delete('tool-slugs.TextToSlug');
    }
}
