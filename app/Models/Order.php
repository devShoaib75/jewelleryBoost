<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
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
     * Get the user that placed this order
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
     * Scope: Get pending orders
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending')->orderBy('created_at', 'desc');
    }

    /**
     * Scope: Get confirmed orders
     */
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed')->orderBy('created_at', 'desc');
    }

    /**
     * Scope: Get shipped orders
     */
    public function scopeShipped($query)
    {
        return $query->where('status', 'shipped')->orderBy('created_at', 'desc');
    }

    /**
     * Scope: Get delivered orders
     */
    public function scopeDelivered($query)
    {
        return $query->where('status', 'delivered')->orderBy('created_at', 'desc');
    }

    /**
     * Scope: Get cancelled orders
     */
    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled')->orderBy('created_at', 'desc');
    }

    /**
     * Scope: Filter by status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status)->orderBy('created_at', 'desc');
    }

    /**
     * Scope: Get recent orders (backwards compatibility)
     */
    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Get all pending orders (for backwards compatibility)
     */
    public static function getPending()
    {
        return self::pending()->get();
    }

    /**
     * Get all confirmed orders (for backwards compatibility)
     */
    public static function getConfirmed()
    {
        return self::confirmed()->get();
    }

    /**
     * Get orders by status (for backwards compatibility)
     */
    public static function getByStatus($status)
    {
        return self::byStatus($status)->get();
    }

    /**
     * Get all orders with recent first (for backwards compatibility)
     */
    public static function getAll()
    {
        return self::recent()->get();
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
