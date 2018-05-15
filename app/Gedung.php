<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    protected $table = 'gedung';

    protected $fillable = [
        'nama','lokasi','luas','jumlah_lantai','tahun_pembangunan'
    ];

    
}
