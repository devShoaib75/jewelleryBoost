<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SizeOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'size_name',
        'length_inches',
        'length_cm',
        'best_for',
        'style',
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
