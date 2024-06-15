<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properti extends Model
{
    use HasFactory;

    protected $table = 'properti';

    protected $fillable = [
        'namaproperti',
        'deskripsiproperti',
        'kamartidur',
        'kamarmandi',
        'tipe',
        'fitur',
        'links',
        'foto_properti',
        'checkout_status'
    ];
    
    public function checkoutstatus()
    {
        $this->update(['checkout_status' => true]);
    }
}
