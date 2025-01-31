<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddGzipTestToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-gzip-test.enabled', TRUE);
        $this->migrator->add('tool-gzip-test.title', 'GZIP Compression Test');
        $this->migrator->add('tool-gzip-test.summary', 'Test if Gzip is working on your website.');
        $this->migrator->add('tool-gzip-test.description', 'Test if Gzip is working on your website.');

        $this->migrator->add("tool-gzip-test.metaDescription", "Test if Gzip is working on your website.");
        $this->migrator->add("tool-gzip-test.metaKeywords", "");

        $this->migrator->add('tool-slugs.GzipTest', 'gzip-test');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-gzip-test.enabled');
        $this->migrator->delete('tool-gzip-test.title');
        $this->migrator->delete('tool-gzip-test.summary');
        $this->migrator->delete('tool-gzip-test.description');

        $this->migrator->delete('tool-gzip-test.metaDescription');
        $this->migrator->delete('tool-gzip-test.metaKeywords');

        $this->migrator->delete('tool-slugs.GzipTest');
    }
}
