<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    // Nama tabel yang terkait
    protected $table = 'transaction_items';

    // Kolom yang bisa diisi
    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantity',
        'price',
        'total_price',
    ];

    // Relasi dengan transaksi
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    // Relasi dengan produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
