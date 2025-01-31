<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddDuplicateLinesRemoverToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-duplicate-lines-remover.enabled', TRUE);
        $this->migrator->add('tool-duplicate-lines-remover.title', 'Duplicate Lines Remover');
        $this->migrator->add('tool-duplicate-lines-remover.summary', 'Delete duplicate lines from text.');
        $this->migrator->add('tool-duplicate-lines-remover.description', 'Duplicate Lines Remover is a useful tool that allows you to remoev duplicate lines from any piece of text. Make sure that each line is on a new line. Click on the Button to remove the duplicate lines.');
    
        $this->migrator->add('tool-slugs.DuplicateLinesRemover', 'duplicate-lines-remover');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-duplicate-lines-remover.enabled');
        $this->migrator->delete('tool-duplicate-lines-remover.title');
        $this->migrator->delete('tool-duplicate-lines-remover.summary');
        $this->migrator->delete('tool-duplicate-lines-remover.description');

        $this->migrator->delete('tool-slugs.DuplicateLinesRemover');
    }
}
