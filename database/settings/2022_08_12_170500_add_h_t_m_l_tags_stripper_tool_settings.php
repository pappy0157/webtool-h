<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddHTMLTagsStripperToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-html-tags-stripper.enabled', TRUE);
        $this->migrator->add('tool-html-tags-stripper.title', 'HTML Tags Stripper');
        $this->migrator->add('tool-html-tags-stripper.summary', 'Get Rid of HTML Tags in Code.');
        $this->migrator->add('tool-html-tags-stripper.description', 'HTML Tags Stripper is a useful tool that allows you to get rid of any HTML tags within a document. Paste your document in the text-area and click on the button to strip the HTML tags.');
    
        $this->migrator->add('tool-slugs.HTMLTagsStripper', 'html-tags-stripper');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-html-tags-stripper.enabled');
        $this->migrator->delete('tool-html-tags-stripper.title');
        $this->migrator->delete('tool-html-tags-stripper.summary');
        $this->migrator->delete('tool-html-tags-stripper.description');

        $this->migrator->delete('tool-slugs.HTMLTagsStripper');
    }
}
