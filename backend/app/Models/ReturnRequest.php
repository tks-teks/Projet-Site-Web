<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_item_id',
        'status',
        'reason',
        'requested_by',
        'approved_by',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function requester()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function refund()
    {
        return $this->hasOne(Refund::class);
    }
}
