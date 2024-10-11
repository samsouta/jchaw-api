<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'category',
        'rating',
    ];
    protected $casts = [
        'rating' => 'array', // Cast the rating field to an array
    ];
}
