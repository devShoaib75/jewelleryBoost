<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'size_name',
        'length_inches',
        'length_cm',
        'best_for',
        'style',
        'sort_order',
    ];

    public static function getAll()
    {
        return self::orderBy('sort_order')->get();
    }
}
