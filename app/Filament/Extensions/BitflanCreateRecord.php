<?php

namespace App\Filament\Extensions;

use App\Bitflan;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use Stevebauman\Purify\Facades\Purify;

class BitflanCreateRecord extends CreateRecord
{
    public function mutateFormDataBeforeSave(array $data): array {
        foreach(static::getResource()::$toSanitize as $field) {
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

    public function create(bool $another = false): void
    {
        if( ! Bitflan::DEMO_MODE ) {
            parent::create($another);
        } else
            $this->notify('success', 'This feature is disabled in Demo Mode.');
    }

    public function createAndCreateAnother(): void
    {
        if( ! Bitflan::DEMO_MODE ) {
            parent::createAndCreateAnother();
        } else
            $this->notify('success', 'This feature is disabled in Demo Mode.');
    }
}
