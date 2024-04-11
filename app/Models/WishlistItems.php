<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistItems extends Model
{
    use HasFactory;

    protected $fillable =[
        'product_id',
        'wishlist_id',
    ];

    protected $table ='wishlist_items';

    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
