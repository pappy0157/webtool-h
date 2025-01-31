<?php

namespace App\Filament\Widgets;

use App\Bitflan;
use Filament\Widgets\Widget;

class SymlinkWarning extends Widget
{
    protected int | string | array $columnSpan = 2;
    protected static ?int   $sort = 6;
    protected static string $view = 'filament.widgets.symlink-warning';
}
