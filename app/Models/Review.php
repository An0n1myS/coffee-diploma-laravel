<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';

    protected $fillable = [
        'email',
        'comment',
        'created_date',
        'blog_id'
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
