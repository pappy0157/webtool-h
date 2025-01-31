<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddSmtpTestToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-smtp-test.enabled', TRUE);
        $this->migrator->add('tool-smtp-test.title', 'Online SMTP Test');
        $this->migrator->add('tool-smtp-test.summary', 'Free advanced online tool to Test and check your SMTP server.');
        $this->migrator->add('tool-smtp-test.description', 'Free advanced online tool to Test and check your SMTP server.');

        $this->migrator->add("tool-smtp-test.metaDescription", "Free advanced online tool to Test and check your SMTP server.");
        $this->migrator->add("tool-smtp-test.metaKeywords", "");

        $this->migrator->add('tool-slugs.SmtpTest', 'smtp-test');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-smtp-test.enabled');
        $this->migrator->delete('tool-smtp-test.title');
        $this->migrator->delete('tool-smtp-test.summary');
        $this->migrator->delete('tool-smtp-test.description');

        $this->migrator->delete('tool-smtp-test.metaDescription');
        $this->migrator->delete('tool-smtp-test.metaKeywords');

        $this->migrator->delete('tool-slugs.SmtpTest');
    }
}
