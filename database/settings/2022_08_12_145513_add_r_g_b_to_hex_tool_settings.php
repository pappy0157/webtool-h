<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddRGBToHexToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-rgb-to-hex.enabled', TRUE);
        $this->migrator->add('tool-rgb-to-hex.title', 'RGB To Hex');
        $this->migrator->add('tool-rgb-to-hex.summary', 'Convert RGB Colors to Hexcodes.');
        $this->migrator->add('tool-rgb-to-hex.description', 'RGB To Hex is a useful tool that allows you to convert RGB Colors to Hex. Just type in your RGB Color and Click on the Button to convert to hex.');
    
        $this->migrator->add('tool-slugs.RGBToHex', 'rgb-to-hex');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-rgb-to-hex.enabled');
        $this->migrator->delete('tool-rgb-to-hex.title');
        $this->migrator->delete('tool-rgb-to-hex.summary');
        $this->migrator->delete('tool-rgb-to-hex.description');

        $this->migrator->delete('tool-slugs.RGBToHex');
    }
}
