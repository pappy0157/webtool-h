<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddBlogSectionOptionToGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.contactTitle', 'Contact Us');
        $this->migrator->add('general.contactKeywords', 'contact, get in touch');

        $this->migrator->add('general.blogSection', TRUE);
        $this->migrator->add('general.blogTitle', 'Blog');
        $this->migrator->add('general.blogKeywords', 'blog,posts,articles');
        $this->migrator->add('general.blogDescription', 'Latest News, Articles, Tips & Tricks from CyberTools.');
    }

    public function down(): void
    {
        $this->migrator->delete('general.contactTitle');
        $this->migrator->delete('general.contactKeywords');
        
        $this->migrator->delete('general.blogSection');
        $this->migrator->delete('general.blogTitle');
        $this->migrator->delete('general.blogKeywords');
        $this->migrator->delete('general.blogDescription');
    }
}
