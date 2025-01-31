<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddQuotedPrintableDecodeToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-quoted-printable-decode.enabled', TRUE);
        $this->migrator->add('tool-quoted-printable-decode.title', 'Decode Quoted Printable');
        $this->migrator->add('tool-quoted-printable-decode.summary', 'To decode a regular text to Quoted Printable, type in the box on top and click the Decode button.');
        $this->migrator->add('tool-quoted-printable-decode.description', 'To decode a regular text to Quoted Printable, type in the box on top and click the Decode button.');

        $this->migrator->add("tool-quoted-printable-decode.metaDescription", "To decode a regular text to Quoted Printable, type in the box on top and click the Decode button.");
        $this->migrator->add("tool-quoted-printable-decode.metaKeywords", "");

        $this->migrator->add('tool-slugs.QuotedPrintableDecode', 'quoted-printable-decode');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-quoted-printable-decode.enabled');
        $this->migrator->delete('tool-quoted-printable-decode.title');
        $this->migrator->delete('tool-quoted-printable-decode.summary');
        $this->migrator->delete('tool-quoted-printable-decode.description');

        $this->migrator->delete('tool-quoted-printable-decode.metaDescription');
        $this->migrator->delete('tool-quoted-printable-decode.metaKeywords');

        $this->migrator->delete('tool-slugs.QuotedPrintableDecode');
    }
}
