<?php

namespace App\Filament\Extensions;

use App\Bitflan;
use Filament\Pages\Actions\DeleteAction;
use Filament\Pages\Actions\ForceDeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;
use Stevebauman\Purify\Facades\Purify;

class BitflanEditRecord extends EditRecord
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

    public function save(bool $shouldRedirect = true): void
    {
        if( ! Bitflan::DEMO_MODE ) {
            parent::save($shouldRedirect);
        } else
            $this->notify('success', 'This feature is disabled in Demo Mode.');
    }
    
    protected function configureForceDeleteAction(ForceDeleteAction $action): void {
        $resource = static::getResource();

        $action
            ->authorize($resource::canForceDelete($this->getRecord()) && !Bitflan::DEMO_MODE)
            ->record($this->getRecord())
            ->recordTitle($this->getRecordTitle())
            ->successRedirectUrl($resource::getUrl('index'));
    }

    protected function configureDeleteAction(DeleteAction $action): void
    {
        $resource = static::getResource();

        $action
            ->authorize($resource::canDelete($this->getRecord()) && !Bitflan::DEMO_MODE)
            ->record($this->getRecord())
            ->recordTitle($this->getRecordTitle())
            ->successRedirectUrl($resource::getUrl('index'));
    }
}
