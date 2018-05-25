<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = "dosen";

    // protected $dates = ['tanggal_lahir'];

    // protected $primaryKey = 'id';

    protected $fillable=
    [
    'id',
    'nama',
    'nip',
    'nidn',
    'gelar_depan',
    'gelar_belakang',
    'nohp',
    'tempat_lahir',
    'tanggal_lahir',
    'jenis_kelamin',
   
    ];

    

}
