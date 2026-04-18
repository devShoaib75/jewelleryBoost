<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'icon',
        'name',
        'sub_text',
        'price',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
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
