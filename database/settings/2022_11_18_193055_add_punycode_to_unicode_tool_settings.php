<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddPunycodeToUnicodeToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-punycode-to-unicode.enabled', TRUE);
        $this->migrator->add('tool-punycode-to-unicode.title', 'Punycode to Unicode');
        $this->migrator->add('tool-punycode-to-unicode.summary', 'Convert Punycode to Unicode.');
        $this->migrator->add('tool-punycode-to-unicode.description', 'Punycode to Unicode is a useful tool that helps you convert punycode to unicode.');
    
        $this->migrator->add("tool-punycode-to-unicode.metaDescription", "Punycode to Unicode is a useful tool that helps you convert punycode to unicode.");
        $this->migrator->add("tool-punycode-to-unicode.metaKeywords", "");

        $this->migrator->add('tool-slugs.PunycodeToUnicode', 'punycode-to-unicode');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-punycode-to-unicode.enabled');
        $this->migrator->delete('tool-punycode-to-unicode.title');
        $this->migrator->delete('tool-punycode-to-unicode.summary');
        $this->migrator->delete('tool-punycode-to-unicode.description');

        $this->migrator->delete('tool-punycode-to-unicode.metaDescription');
        $this->migrator->delete('tool-punycode-to-unicode.metaKeywords');

        $this->migrator->delete('tool-slugs.PunycodeToUnicode');
    }
}
