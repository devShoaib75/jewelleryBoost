<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_details';

    protected $fillable = [
        'product_name',
        'category',
        'current_price',
        'old_price',
        'description',
        'gold_purity',
        'total_weight',
        'stone_setting',
        'includes',
        'certification',
        'delivery',
    ];

    protected $casts = [
        'current_price' => 'decimal:2',
        'old_price' => 'decimal:2',
    ];

    public static function getActive()
    {
        return self::first() ?? new self();
    }
}
