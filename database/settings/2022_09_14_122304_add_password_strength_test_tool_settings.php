<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddPasswordStrengthTestToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-password-strength-test.enabled', TRUE);
        $this->migrator->add('tool-password-strength-test.title', 'Password Strength Test');
        $this->migrator->add('tool-password-strength-test.summary', 'Check the strength of your Passwords');
        $this->migrator->add('tool-password-strength-test.description', 'Password Strength Test is a useful tool that allows you to check the strength of your passwords.');
    
        $this->migrator->add("tool-password-strength-test.metaDescription", "Password Strength Test is a useful tool that allows you to check the strength of your passwords.");
        $this->migrator->add("tool-password-strength-test.metaKeywords", "");

        $this->migrator->add('tool-slugs.PasswordStrengthTest', 'password-strength-test');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-password-strength-test.enabled');
        $this->migrator->delete('tool-password-strength-test.title');
        $this->migrator->delete('tool-password-strength-test.summary');
        $this->migrator->delete('tool-password-strength-test.description');

        $this->migrator->delete('tool-password-strength-test.metaDescription');
        $this->migrator->delete('tool-password-strength-test.metaKeywords');

        $this->migrator->delete('tool-slugs.PasswordStrengthTest');
    }
}
