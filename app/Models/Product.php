<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'description',
        'tags',
        'product_categories_id'
    ];

    public function Categories(): BelongsTo 
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function Galleries(): BelongsTo
    {
        return $this->belongsTo(ProductGallery::class, 'id');
    }
}
