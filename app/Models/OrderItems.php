<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $fillable =[
        'order_id',
        'item',
        'count',
    ];

    protected $table ='ordered_items';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'item');
    }
}
