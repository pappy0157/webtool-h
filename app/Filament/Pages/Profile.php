<?php

namespace App\Filament\Pages;

use App\Bitflan;

class Profile extends \RyanChandler\FilamentProfile\Pages\Profile
{
    public function submit()
    {
        if( ! Bitflan::DEMO_MODE ) {
            parent::submit();
        } else
            $this->notify('success', 'This feature is disabled in Demo Mode.');
    }
}
