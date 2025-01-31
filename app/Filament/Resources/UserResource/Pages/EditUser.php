<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Extensions\BitflanEditRecord;
use App\Filament\Resources\UserResource;

class EditUser extends BitflanEditRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        $resource = static::getResource();

        return array_merge(
            (($resource::hasPage('view') && $resource::canView($this->record)) ? [$this->getViewAction()] : []),
            ($resource::canDelete($this->record) ? [$this->getDeleteAction()] : [])
        );
    }

    public function mutateFormDataBeforeSave(array $data): array
    {
        $data = parent::mutateFormDataBeforeSave($data);
        
        if($data['pass'] && !empty($data['pass']))
            $data['password'] = bcrypt($data['pass']);
        else
            unset($data['pass']);

        return $data;
    }
}
