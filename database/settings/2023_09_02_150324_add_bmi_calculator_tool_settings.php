<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddBmiCalculatorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-bmi-calculator.enabled', TRUE);
        $this->migrator->add('tool-bmi-calculator.title', 'BMI Calculator');
        $this->migrator->add('tool-bmi-calculator.summary', 'Body mass index (BMI) is a measure of body fat based on height and weight that applies to adult men and women.');
        $this->migrator->add('tool-bmi-calculator.description', 'Body mass index (BMI) is a measure of body fat based on height and weight that applies to adult men and women.');

        $this->migrator->add("tool-bmi-calculator.metaDescription", "Body mass index (BMI) is a measure of body fat based on height and weight that applies to adult men and women.");
        $this->migrator->add("tool-bmi-calculator.metaKeywords", "");

        $this->migrator->add('tool-slugs.BmiCalculator', 'bmi-calculator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-bmi-calculator.enabled');
        $this->migrator->delete('tool-bmi-calculator.title');
        $this->migrator->delete('tool-bmi-calculator.summary');
        $this->migrator->delete('tool-bmi-calculator.description');

        $this->migrator->delete('tool-bmi-calculator.metaDescription');
        $this->migrator->delete('tool-bmi-calculator.metaKeywords');

        $this->migrator->delete('tool-slugs.BmiCalculator');
    }
}
