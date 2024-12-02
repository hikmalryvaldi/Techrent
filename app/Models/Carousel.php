<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    // Field yang dapat diisi
    protected $fillable = ['product_name', 'image_path'];
}
