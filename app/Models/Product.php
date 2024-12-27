<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'brand',
        'price',
        'stock',
        'category_id',
        'description',
    ];

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function featuredProduct()
    {
        return $this->hasOne(FeaturedProduct::class, 'product_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
