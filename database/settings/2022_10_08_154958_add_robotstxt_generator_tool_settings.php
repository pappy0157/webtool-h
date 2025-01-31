<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddRobotstxtGeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-robotstxt-generator.enabled', TRUE);
        $this->migrator->add('tool-robotstxt-generator.title', 'Robots.txt Generator');
        $this->migrator->add('tool-robotstxt-generator.summary', 'Generate Robots.txt Files');
        $this->migrator->add('tool-robotstxt-generator.description', 'Robots.txt Generator is a useful tool that helps you generate Robots.txt files to handle many types of bot visitors on your website.');
    
        $this->migrator->add("tool-robotstxt-generator.metaDescription", "Robots.txt Generator is a useful tool that helps you generate Robots.txt files to handle many types of bot visitors on your website.");
        $this->migrator->add("tool-robotstxt-generator.metaKeywords", "");

        $this->migrator->add('tool-slugs.RobotstxtGenerator', 'robotstxt-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-robotstxt-generator.enabled');
        $this->migrator->delete('tool-robotstxt-generator.title');
        $this->migrator->delete('tool-robotstxt-generator.summary');
        $this->migrator->delete('tool-robotstxt-generator.description');

        $this->migrator->delete('tool-robotstxt-generator.metaDescription');
        $this->migrator->delete('tool-robotstxt-generator.metaKeywords');

        $this->migrator->delete('tool-slugs.RobotstxtGenerator');
    }
}
