<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ktp extends Model
{
    use HasFactory;

    protected $table = 'ktp';
    protected $fillable = [
        'id_ktp',
        'nama',
        'tanggal_lahir',
        'jk',
        'alamat',
        'rt/rw',
        'kel/desa',
        'kec',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'kewarganegaraan',
    ];
}
