<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeminjamanRuangan extends Model
{
    protected $table = 'peminjaman_ruangan';
    protected $fillable = [
        'ruangan_id', 'peminjam_id', 'pengaju', 'tanggal_pengajuan', 'tanggal_peminjaman','jam_mulai', 'tanggal_selesai','jam_selesai','peminjaman_status_id','tujuan'
    ];
    public function status()
    {
    	return $this->belongsTo('App\PeminjamanStatus','peminjaman_status_id');
    }
	public function ruangan()
    {
    	return $this->belongsTo('App\Ruangan','ruangan_id');
    }
}

