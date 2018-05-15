<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';

    protected $fillable = [
        'gedung_id', 'nama', 'luas', 'lantai', 'bisa_dipinjam', 'ruangan_kondisi_id', 'ruangan_fungsi_id', 'unit_pengelola_id', 'created_at'
    ];

    public function kondisi()
    {
        return $this->belongsTo(RuanganKondisi::class, 'ruangan_kondisi_id');
    }

    public function fungsi()
    {
        return $this->belongsTo(RuanganFungsi::class, 'ruangan_fungsi_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_pengelola_id');
    }
}
