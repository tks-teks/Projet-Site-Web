<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'total_amount',
        'currency',
        'channel',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
