<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'total', 'quantity', 'purchase_date'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public static function calculateTotal(Product $product, int $quantity) : float
    {
        return $product->price * $quantity;
    }
}
