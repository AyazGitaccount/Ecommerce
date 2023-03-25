<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Whishlist extends Model
{
    use HasFactory;

    protected $table = "whishlists";

    protected $fillable = ['user_id','product_id','product_name'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
