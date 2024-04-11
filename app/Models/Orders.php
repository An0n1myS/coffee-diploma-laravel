<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'date',
        'status_id',
        'delivery_id',
        'payment_id',
        'total_amount'
    ];

    protected $table ='orders';
    public $timestamps=false;
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id');
    }
}
