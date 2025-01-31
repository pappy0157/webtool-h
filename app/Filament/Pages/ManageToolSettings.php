<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ManageToolSettings extends Page
{
    protected static ?string $navigationLabel = 'Web Tools Settings';
    protected static ?string $navigationGroup = 'Administration';
    protected static ?string $navigationIcon  = 'heroicon-o-adjustments';

    protected static string $view = 'filament.pages.manage-tool-settings';

    public array $allTools;

    public function mount() {
        $this->allTools = config('tools.categories');
    }
}
