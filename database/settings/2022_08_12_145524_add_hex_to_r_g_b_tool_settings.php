<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddHexToRGBToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-hex-to-rgb.enabled', TRUE);
        $this->migrator->add('tool-hex-to-rgb.title', 'Hex To RGB');
        $this->migrator->add('tool-hex-to-rgb.summary', 'Convert Hex Colors to RGB.');
        $this->migrator->add('tool-hex-to-rgb.description', 'Hex To RGB is a useful tool that allows you to convert Hex Colors to RGB. Just type in your Hex Color and Click on the Button to convert to RGB.');
    
        $this->migrator->add('tool-slugs.HexToRGB', 'hex-to-rgb');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-hex-to-rgb.enabled');
        $this->migrator->delete('tool-hex-to-rgb.title');
        $this->migrator->delete('tool-hex-to-rgb.summary');
        $this->migrator->delete('tool-hex-to-rgb.description');

        $this->migrator->delete('tool-slugs.HexToRGB');
    }
}
