<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    use HasFactory;
    protected $fillable =[
        'product_id',
        'cart_id',
        'count'
    ];

    protected $table ='cart_items';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
}
