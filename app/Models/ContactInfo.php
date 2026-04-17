<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $table = 'contact_info';

    protected $fillable = [
        'shop_address',
        'shop_hours',
        'facebook_url',
        'facebook_name',
        'whatsapp_number',
        'email',
        'brand_name',
        'tagline',
        'copyright',
    ];

    public static function getActive()
    {
        return self::first() ?? new self();
    }
}
