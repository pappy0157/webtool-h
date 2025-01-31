<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddHTMLToMarkdownToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-html-to-markdown.enabled', TRUE);
        $this->migrator->add('tool-html-to-markdown.title', 'HTML To Markdown');
        $this->migrator->add('tool-html-to-markdown.summary', 'Convert HTML Documents to Markdown.');
        $this->migrator->add('tool-html-to-markdown.description', 'HTML to Markdown is a converter that allows you to convert your HTML documents into Markdown Format. Markdown is a simplified format for creating documents. Paste in your HTML Code and click on the button to generate the Markdown.');
    
        $this->migrator->add('tool-slugs.HTMLToMarkdown', 'html-to-markdown');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-html-to-markdown.enabled');
        $this->migrator->delete('tool-html-to-markdown.title');
        $this->migrator->delete('tool-html-to-markdown.summary');
        $this->migrator->delete('tool-html-to-markdown.description');

        $this->migrator->delete('tool-slugs.HTMLToMarkdown');
    }
}
