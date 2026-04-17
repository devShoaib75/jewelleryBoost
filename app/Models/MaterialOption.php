<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialOption extends Model
{
    use HasFactory;

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

    public static function getAll()
    {
        return self::orderBy('sort_order')->get();
    }
}
