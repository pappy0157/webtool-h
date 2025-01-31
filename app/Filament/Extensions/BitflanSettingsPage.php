<?php

namespace App\Filament\Extensions;

use App\Bitflan;
use Filament\Pages\SettingsPage;
use Illuminate\Support\Str;
use Stevebauman\Purify\Facades\Purify;

class BitflanSettingsPage extends SettingsPage {
    protected $toSanitize = [];

    public function mutateFormDataBeforeSave(array $data) : array {
        foreach($this->toSanitize as $field) {
            if(!Str::contains($field, '.')) {
                $data[$field] = Purify::clean($data[$field]);
                continue;
            }

            $exp = explode('.', $field);

            if(count($exp) == 2) {
                for($i = 0; $i < count($data[$exp[0]]); $i++) {
                    $data[$exp[0]][$i][$exp[1]] = Purify::clean($data[$exp[0]][$i][$exp[1]]);
                }
            }
        }

        return $data;
    }

    public function save(): void
    {
        if( ! Bitflan::DEMO_MODE ) {
            parent::save();
        } else 
            $this->notify('success', 'This feature is disabled in Demo Mode.');
    }
}