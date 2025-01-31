<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddMemoryStorageConverterToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-memory-storage-converter.enabled', TRUE);
        $this->migrator->add('tool-memory-storage-converter.title', 'Memory / Storage Converter');
        $this->migrator->add('tool-memory-storage-converter.summary', 'Convert any Memory / Storage Units.');
        $this->migrator->add('tool-memory-storage-converter.description', 'Memory Storage Converter is a useful tool that helps you convert memory / storage units.');
    
        $this->migrator->add("tool-memory-storage-converter.metaDescription", "Memory Storage Converter is a useful tool that helps you convert memory / storage units.");
        $this->migrator->add("tool-memory-storage-converter.metaKeywords", "");

        $this->migrator->add('tool-slugs.MemoryStorageConverter', 'memory-storage-converter');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-memory-storage-converter.enabled');
        $this->migrator->delete('tool-memory-storage-converter.title');
        $this->migrator->delete('tool-memory-storage-converter.summary');
        $this->migrator->delete('tool-memory-storage-converter.description');

        $this->migrator->delete('tool-memory-storage-converter.metaDescription');
        $this->migrator->delete('tool-memory-storage-converter.metaKeywords');

        $this->migrator->delete('tool-slugs.MemoryStorageConverter');
    }
}
