<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_phone',
        'customer_whatsapp',
        'customer_email',
        'delivery_address',
        'city',
        'necklace_size',
        'product_name',
        'material_option',
        'product_price',
        'making_charge',
        'delivery_charge',
        'total_price',
        'payment_method',
        'special_notes',
        'status',
    ];

    protected $casts = [
        'product_price' => 'decimal:2',
        'making_charge' => 'decimal:2',
        'delivery_charge' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    /**
     * Generate unique order number
     */
    public static function generateOrderNumber()
    {
        $year = date('Y');
        $count = Order::whereYear('created_at', $year)->count() + 1;
        return 'ORD-' . $year . '-' . str_pad($count, 5, '0', STR_PAD_LEFT);
    }

    /**
     * Get all pending orders
     */
    public static function getPending()
    {
        return self::where('status', 'pending')->orderBy('created_at', 'desc')->get();
    }

    /**
     * Get all confirmed orders
     */
    public static function getConfirmed()
    {
        return self::where('status', 'confirmed')->orderBy('created_at', 'desc')->get();
    }

    /**
     * Get orders by status
     */
    public static function getByStatus($status)
    {
        return self::where('status', $status)->orderBy('created_at', 'desc')->get();
    }

    /**
     * Get all orders with recent first
     */
    public static function getAll()
    {
        return self::orderBy('created_at', 'desc')->get();
    }

    /**
     * Get orders count by status
     */
    public static function countByStatus()
    {
        return [
            'pending' => self::where('status', 'pending')->count(),
            'confirmed' => self::where('status', 'confirmed')->count(),
            'shipped' => self::where('status', 'shipped')->count(),
            'delivered' => self::where('status', 'delivered')->count(),
            'cancelled' => self::where('status', 'cancelled')->count(),
        ];
    }
}
