<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeroSection extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'badge',
        'title_main',
        'title_highlight',
        'subtitle',
        'cta_text',
    ];

    public static function getActive()
    {
        return self::first() ?? new self();
    }
}
