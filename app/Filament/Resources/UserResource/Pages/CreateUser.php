<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Extensions\BitflanCreateRecord;
use App\Filament\Resources\UserResource;

class CreateUser extends BitflanCreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if($data['pass'] && !empty($data['pass']))
            $data['password'] = bcrypt($data['pass']);
        else
            $data['password'] = bcrypt('Qwerty1234');

        return $data;
    }
}
