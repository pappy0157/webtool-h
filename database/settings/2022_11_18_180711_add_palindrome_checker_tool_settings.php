<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddPalindromeCheckerToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-palindrome-checker.enabled', TRUE);
        $this->migrator->add('tool-palindrome-checker.title', 'Palindrome Checker');
        $this->migrator->add('tool-palindrome-checker.summary', 'Check whether a string is a palindrome or not.');
        $this->migrator->add('tool-palindrome-checker.description', 'Palindrome Checker is a useful tool that helps you find out whether a string is a Palindrome or not.');
    
        $this->migrator->add("tool-palindrome-checker.metaDescription", "Palindrome Checker is a useful tool that helps you find out whether a string is a Palindrome or not.");
        $this->migrator->add("tool-palindrome-checker.metaKeywords", "");

        $this->migrator->add('tool-slugs.PalindromeChecker', 'palindrome-checker');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-palindrome-checker.enabled');
        $this->migrator->delete('tool-palindrome-checker.title');
        $this->migrator->delete('tool-palindrome-checker.summary');
        $this->migrator->delete('tool-palindrome-checker.description');

        $this->migrator->delete('tool-palindrome-checker.metaDescription');
        $this->migrator->delete('tool-palindrome-checker.metaKeywords');

        $this->migrator->delete('tool-slugs.PalindromeChecker');
    }
}
