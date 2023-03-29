<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\History;
use App\Models\Product;
use PhpParser\Node\Expr\Cast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function carts()
    {
        return $this->hasMany(Product::class);
    }

    public function detail()
    {
        return $this->hasMany(History::class);
    }

    public function history()
    {
        // return $this->hasMany(History::class, 'transaction_id', 'transaction_id');
        return $this->hasMany(History::class, 'transaction_id', 'id');
    }

    public function getMonthAttribute()
    {
        return Carbon::parse($this->created_at)->month;
    }
}
