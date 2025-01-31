<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddLineBreakRemoverToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-line-break-remover.enabled', TRUE);
        $this->migrator->add('tool-line-break-remover.title', 'Line Break Remover');
        $this->migrator->add('tool-line-break-remover.summary', 'Remove Line Breaks from Text');
        $this->migrator->add('tool-line-break-remover.description', 'Line Break Remover is a useful tool that helps you remove line breaks from any piece of text.');
    
        $this->migrator->add("tool-line-break-remover.metaDescription", "Line Break Remover is a useful tool that helps you remove line breaks from any piece of text.");
        $this->migrator->add("tool-line-break-remover.metaKeywords", "");

        $this->migrator->add('tool-slugs.LineBreakRemover', 'line-break-remover');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-line-break-remover.enabled');
        $this->migrator->delete('tool-line-break-remover.title');
        $this->migrator->delete('tool-line-break-remover.summary');
        $this->migrator->delete('tool-line-break-remover.description');

        $this->migrator->delete('tool-line-break-remover.metaDescription');
        $this->migrator->delete('tool-line-break-remover.metaKeywords');

        $this->migrator->delete('tool-slugs.LineBreakRemover');
    }
}
