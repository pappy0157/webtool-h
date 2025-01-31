<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddEmailValidatorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-email-validator.enabled', TRUE);
        $this->migrator->add('tool-email-validator.title', 'E-Mail Validator');
        $this->migrator->add('tool-email-validator.summary', 'Validate emails individually or in bulk.');
        $this->migrator->add('tool-email-validator.description', 'E-Mail Validator is a useful tool that helps you validate the correctness of any e-mail address individually or many emails in bulk.');
    
        $this->migrator->add("tool-email-validator.metaDescription", "E-Mail Validator is a useful tool that helps you validate the correctness of any e-mail address individually or many emails in bulk.");
        $this->migrator->add("tool-email-validator.metaKeywords", "");

        $this->migrator->add('tool-slugs.EmailValidator', 'email-validator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-email-validator.enabled');
        $this->migrator->delete('tool-email-validator.title');
        $this->migrator->delete('tool-email-validator.summary');
        $this->migrator->delete('tool-email-validator.description');

        $this->migrator->delete('tool-email-validator.metaDescription');
        $this->migrator->delete('tool-email-validator.metaKeywords');

        $this->migrator->delete('tool-slugs.EmailValidator');
    }
}
