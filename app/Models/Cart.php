<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user',
        'product_id',
        'photo',
        'product_description',
        'product_name',
        'price',
        'jenis',
        'jumlah_pembelian'
    ];
}
