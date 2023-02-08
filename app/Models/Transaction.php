<?php

namespace App\Models;

use App\Models\Cart;
use PhpParser\Node\Expr\Cast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    public function carts()
    {
        return $this->hasMany(Product::class);
    }
}
