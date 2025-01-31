<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddCreditCardValidatorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-credit-card-validator.enabled', TRUE);
        $this->migrator->add('tool-credit-card-validator.title', 'Credit Card Validator');
        $this->migrator->add('tool-credit-card-validator.summary', 'Validate any Credit Card Details');
        $this->migrator->add('tool-credit-card-validator.description', 'Credit Card Validator is a useful tool that helps you validate your card details.');
    
        $this->migrator->add("tool-credit-card-validator.metaDescription", "Credit Card Validator is a useful tool that helps you validate your card details.");
        $this->migrator->add("tool-credit-card-validator.metaKeywords", "");

        $this->migrator->add('tool-slugs.CreditCardValidator', 'credit-card-validator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-credit-card-validator.enabled');
        $this->migrator->delete('tool-credit-card-validator.title');
        $this->migrator->delete('tool-credit-card-validator.summary');
        $this->migrator->delete('tool-credit-card-validator.description');

        $this->migrator->delete('tool-credit-card-validator.metaDescription');
        $this->migrator->delete('tool-credit-card-validator.metaKeywords');

        $this->migrator->delete('tool-slugs.CreditCardValidator');
    }
}
