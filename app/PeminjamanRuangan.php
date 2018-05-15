<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeminjamanRuangan extends Model
{
    protected $table = 'peminjaman_ruangan';

    protected $fillable = [
    	'id',
    	'ruangan_id',
    	'peminjaman_id',
    	'pengaju',
    	'tanggal_pengajuan',
    	'tanggal_peminjaman',
    	'jam_mulai',
    	'tanggal_selesai',
    	'jam_selesai',
    	'peminjaman_status_id',
    	'tujuan'
    ];
}
