<?php

namespace App\Filament\Widgets;

use Filament\Widgets\AccountWidget;

class UserProfile extends AccountWidget
{
    protected static ?int $sort = 3;

    protected static string $view = 'widgets.account-widget';
}
