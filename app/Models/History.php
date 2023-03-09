<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product()
    {
        // return $this->belongsTo(Product::class, 'product_id', 'product_id');
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function transaction()
    {
        // return $this->belongsTo(Transaction::class, 'transaction_id', 'transaction_id');
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
