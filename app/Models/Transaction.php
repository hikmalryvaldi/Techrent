<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Nama tabel yang terkait
    protected $table = 'transactions';

    // Kolom yang bisa diisi
    protected $fillable = [
        'user_id',
        'transaction_id',
        'gross_amount',
        'status',
        'payment_url',
    ];

    // Relasi dengan user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan transaction items
    public function transactionItems()
    {
        return $this->hasMany(TransactionItem::class);
    }
}
