<?php

namespace App\Filament\Extensions;

use App\Bitflan;
use Filament\Resources\Pages\ListRecords;

class BitflanListRecords extends ListRecords
{
    public function bulkDelete(): void
    {
        if( ! Bitflan::DEMO_MODE )
            parent::bulkDelete();
        else
            $this->notify('success', 'This feature is disabled in Demo Mode.');
    }
}
