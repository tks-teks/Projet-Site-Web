<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'variant_id',
        'user_id',
        'quantity_change',
        'reason',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
