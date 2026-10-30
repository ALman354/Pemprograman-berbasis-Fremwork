<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mahasiswas extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'alamat',
        'no_hp',
    ];
}
