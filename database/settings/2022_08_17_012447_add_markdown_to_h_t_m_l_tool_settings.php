<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddMarkdownToHTMLToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-markdown-to-html.enabled', TRUE);
        $this->migrator->add('tool-markdown-to-html.title', 'Markdown To HTML');
        $this->migrator->add('tool-markdown-to-html.summary', 'Convert Markdown format to HTML.');
        $this->migrator->add('tool-markdown-to-html.description', 'Markdown to HTML is a converter that allows you to convert your markdown format text into HTML. Markdown is a simplified format for creating documents. Paste in your Markdown format and click on the button to generate the HTML.');
    
        $this->migrator->add('tool-slugs.MarkdownToHTML', 'markdown-to-html');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-markdown-to-html.enabled');
        $this->migrator->delete('tool-markdown-to-html.title');
        $this->migrator->delete('tool-markdown-to-html.summary');
        $this->migrator->delete('tool-markdown-to-html.description');

        $this->migrator->delete('tool-slugs.MarkdownToHTML');
    }
}
