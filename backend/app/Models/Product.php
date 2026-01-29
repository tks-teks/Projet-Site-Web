<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
        'status',
        'seo_title',
        'seo_description',
    ];

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
