<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddTwitterCardGeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-twitter-card-generator.enabled', TRUE);
        $this->migrator->add('tool-twitter-card-generator.title', 'Twitter Card Generator');
        $this->migrator->add('tool-twitter-card-generator.summary', 'Generate Twitter Cards for website embeds.');
        $this->migrator->add('tool-twitter-card-generator.description', 'Twitter card generator is a useful tool that helps you generate twitter cards.');
    
        $this->migrator->add("tool-twitter-card-generator.metaDescription", "Twitter card generator is a useful tool that helps you generate twitter cards.");
        $this->migrator->add("tool-twitter-card-generator.metaKeywords", "");

        $this->migrator->add('tool-slugs.TwitterCardGenerator', 'twitter-card-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-twitter-card-generator.enabled');
        $this->migrator->delete('tool-twitter-card-generator.title');
        $this->migrator->delete('tool-twitter-card-generator.summary');
        $this->migrator->delete('tool-twitter-card-generator.description');

        $this->migrator->delete('tool-twitter-card-generator.metaDescription');
        $this->migrator->delete('tool-twitter-card-generator.metaKeywords');

        $this->migrator->delete('tool-slugs.TwitterCardGenerator');
    }
}
