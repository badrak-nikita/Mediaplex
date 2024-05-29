<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chackout extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'user_id',
        'product_name',
        'price',
        'image',
        'product_id',
        'payment_status',
        'delivery_status'
    ];
}