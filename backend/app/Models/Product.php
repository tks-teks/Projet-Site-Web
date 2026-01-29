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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function media()
    {
        return $this->hasMany(ProductMedia::class);
    }

    public function assignments()
    {
        return $this->hasMany(ProductAssignment::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }
}
