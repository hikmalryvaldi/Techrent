<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeaturedProduct extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'rental_count'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
