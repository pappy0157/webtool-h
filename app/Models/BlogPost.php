<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BlogPost extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'summary',
        'content'
    ];

    protected $fillable = [
        'title',
        'slug',
        'content',
        'summary',
        'keywords',
        'thumbnail'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }
}
