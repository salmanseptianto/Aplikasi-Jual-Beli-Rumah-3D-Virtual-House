<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    
    use HasFactory;
    
    protected $table = 'pembelian';

    protected $fillable = [
        'idpembelian',
        'notransaksi',
        'id',
        'tanggalbeli',
        'totalbeli',
        'alamat',
        'statusbeli',
        'waktu',
    ];
}
