<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    
    use HasFactory;
    
    protected $table = 'pengguna';

    protected $fillable = [
        'id',
        'nama',
        'email',
        'password',
        'telepon',
        'alamat',
        'fotoprofil',
        'level',
        'kelamin',
    ];
}
