<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddUnicodeToPunycodeToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-unicode-to-punycode.enabled', TRUE);
        $this->migrator->add('tool-unicode-to-punycode.title', 'Unicode to Punycode');
        $this->migrator->add('tool-unicode-to-punycode.summary', 'Convert Unicode to Punycode.');
        $this->migrator->add('tool-unicode-to-punycode.description', 'Unicode to Punycode is a useful tool that helps you convert unicode to punycode.');
    
        $this->migrator->add("tool-unicode-to-punycode.metaDescription", "Unicode to Punycode is a useful tool that helps you convert unicode to punycode.");
        $this->migrator->add("tool-unicode-to-punycode.metaKeywords", "");

        $this->migrator->add('tool-slugs.UnicodeToPunycode', 'unicode-to-punycode');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-unicode-to-punycode.enabled');
        $this->migrator->delete('tool-unicode-to-punycode.title');
        $this->migrator->delete('tool-unicode-to-punycode.summary');
        $this->migrator->delete('tool-unicode-to-punycode.description');

        $this->migrator->delete('tool-unicode-to-punycode.metaDescription');
        $this->migrator->delete('tool-unicode-to-punycode.metaKeywords');

        $this->migrator->delete('tool-slugs.UnicodeToPunycode');
    }
}
