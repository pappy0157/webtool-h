<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Extensions\Reorderable;
use App\Filament\Resources\PageResource;

class OrderPage extends Reorderable {
    protected static string $resource   = PageResource::class;
    protected static string $titleField = 'title'; 
}