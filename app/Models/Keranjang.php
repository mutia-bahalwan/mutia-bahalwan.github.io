<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang'; // Sesuaikan dengan nama tabel di database jika diperlukan

    protected $fillable = [
        'user',
        'photo',
        'product_description',
        'product_name',
        'price',
        'jenis',
        'jumlah_pembelian',
    ];
}
