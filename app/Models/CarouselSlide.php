<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselSlide extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'tag',
        'caption',
        'image_path',
        'sort_order',
    ];

    public static function getAll()
    {
        return self::orderBy('sort_order')->get();
    }
}
