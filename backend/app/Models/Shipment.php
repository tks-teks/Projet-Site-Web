<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'carrier',
        'status',
        'tracking_number',
        'zone',
        'shipping_cost',
    ];

    protected $casts = [
        'shipping_cost' => 'decimal:2',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
