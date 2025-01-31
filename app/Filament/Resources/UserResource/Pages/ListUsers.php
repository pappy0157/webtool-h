<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Extensions\BitflanListRecords;
use App\Filament\Resources\UserResource;

class ListUsers extends BitflanListRecords
{
    protected static string $resource = UserResource::class;
}
