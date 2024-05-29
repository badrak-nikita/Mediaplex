<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'product_name',
        'price',
        'image',
        'product_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}