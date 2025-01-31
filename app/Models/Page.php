<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'content'
    ];

    protected $fillable = [
        'title',
        'slug',
        'content',
        'location',
        'order',
        'seoDescription',
        'seoKeywords'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
