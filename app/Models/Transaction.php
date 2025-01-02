<?php

namespace App\Models;

use App\Models\TransactionItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'status_pengiriman',
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
