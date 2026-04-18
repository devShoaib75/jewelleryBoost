<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarouselSlide extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'icon',
        'tag',
        'caption',
        'image_path',
        'sort_order',
    ];

    public function scopeSorted($query)
    {
        return $query->orderBy('sort_order');
    }

    public static function getAll()
    {
        return self::sorted()->get();
    }
}
