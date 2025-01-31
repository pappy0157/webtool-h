<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddDomainGeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-domain-generator.enabled', TRUE);
        $this->migrator->add('tool-domain-generator.affiliateUrl', 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={name}&x=21&y=12');
        $this->migrator->add('tool-domain-generator.title', 'Domain Generator');
        $this->migrator->add('tool-domain-generator.summary', 'Generate Domain names from keywords.');
        $this->migrator->add('tool-domain-generator.description', 'Domain Generator is a useful tool that allows you to generate .com, .net, .org, .info, .xyz, .biz domain names based on any keyword or multiple words.');
    
        $this->migrator->add('tool-slugs.DomainGenerator', 'domain-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-domain-generator.enabled');
        $this->migrator->delete('tool-domain-generator.affiliateUrl');
        $this->migrator->delete('tool-domain-generator.title');
        $this->migrator->delete('tool-domain-generator.summary');
        $this->migrator->delete('tool-domain-generator.description');

        $this->migrator->delete('tool-slugs.DomainGenerator');
    }
}
