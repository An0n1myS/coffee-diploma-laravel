<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'short_text',
        'long_text',
        'photo_url',
        'created_date'

    ];

    protected $table ='blog';

    public $timestamps = false;
}
