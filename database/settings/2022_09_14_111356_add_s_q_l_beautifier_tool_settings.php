<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddSQLBeautifierToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-sql-beautifier.enabled', TRUE);
        $this->migrator->add('tool-sql-beautifier.title', 'SQL Beautifier');
        $this->migrator->add('tool-sql-beautifier.summary', 'Format SQL Queries');
        $this->migrator->add('tool-sql-beautifier.description', 'SQL Beautifier is a useful tool that allows you to format your SQL Queries.');
    
        $this->migrator->add("tool-sql-beautifier.metaDescription", "SQL Beautifier is a useful tool that allows you to format your SQL Queries.");
        $this->migrator->add("tool-sql-beautifier.metaKeywords", "");

        $this->migrator->add('tool-slugs.SQLBeautifier', 'sql-beautifier');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-sql-beautifier.enabled');
        $this->migrator->delete('tool-sql-beautifier.title');
        $this->migrator->delete('tool-sql-beautifier.summary');
        $this->migrator->delete('tool-sql-beautifier.description');

        $this->migrator->delete('tool-sql-beautifier.metaDescription');
        $this->migrator->delete('tool-sql-beautifier.metaKeywords');

        $this->migrator->delete('tool-slugs.SQLBeautifier');
    }
}
