<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddQuotedPrintableEncodeToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-quoted-printable-encode.enabled', TRUE);
        $this->migrator->add('tool-quoted-printable-encode.title', 'Encode Quoted Printable');
        $this->migrator->add('tool-quoted-printable-encode.summary', 'To encode a regular text to Quoted Printable, type in the box on top and click the Encode button.');
        $this->migrator->add('tool-quoted-printable-encode.description', 'To encode a regular text to Quoted Printable, type in the box on top and click the Encode button.');

        $this->migrator->add("tool-quoted-printable-encode.metaDescription", "To encode a regular text to Quoted Printable, type in the box on top and click the Encode button.");
        $this->migrator->add("tool-quoted-printable-encode.metaKeywords", "");

        $this->migrator->add('tool-slugs.QuotedPrintableEncode', 'quoted-printable-encode');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-quoted-printable-encode.enabled');
        $this->migrator->delete('tool-quoted-printable-encode.title');
        $this->migrator->delete('tool-quoted-printable-encode.summary');
        $this->migrator->delete('tool-quoted-printable-encode.description');

        $this->migrator->delete('tool-quoted-printable-encode.metaDescription');
        $this->migrator->delete('tool-quoted-printable-encode.metaKeywords');

        $this->migrator->delete('tool-slugs.QuotedPrintableEncode');
    }
}
