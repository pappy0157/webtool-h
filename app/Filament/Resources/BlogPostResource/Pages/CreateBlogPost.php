<?php

namespace App\Filament\Resources\BlogPostResource\Pages;

use App\Filament\Extensions\BitflanCreateRecord;
use App\Filament\Resources\BlogPostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogPost extends BitflanCreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = BlogPostResource::class;
}
