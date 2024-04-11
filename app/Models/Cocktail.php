<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'ingredients',
        'user_id',
    ];

    protected $table ='cocktail';

    public $timestamps = false;
}
