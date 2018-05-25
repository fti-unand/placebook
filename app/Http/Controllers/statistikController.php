<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class statistikController extends Controller
{
    public function gabungtable()
    {
		$peminjaman = DB::SELECT(DB::raw("SELECT substr(peminjaman_ruangan.tanggal_peminjaman,1,4) as tahun, gedung.nama as gedung, ruangan.nama as ruangana, COUNT(peminjaman_ruangan.tanggal_peminjaman) as jmlhpeminjam FROM ruangan JOIN peminjaman_ruangan ON ruangan.id = peminjaman_ruangan.ruangan_id JOIN gedung on ruangan.gedung_id=gedung.id GROUP BY ruangan.nama, YEAR(peminjaman_ruangan.tanggal_peminjaman)"));
        
		$perbaikan = DB::SELECT(DB::raw("SELECT substr(perbaikan_ruangan.tanggal_selesai_perbaikan,1,4) as tahun, gedung.nama as gedung, ruangan.nama as ruangana, COUNT(perbaikan_ruangan.id) as jmlhperbaikan FROM ruangan JOIN perbaikan_ruangan ON ruangan.id = perbaikan_ruangan.ruangan_id JOIN gedung on ruangan.gedung_id=gedung.id GROUP BY ruangan.nama, YEAR(perbaikan_ruangan.tanggal_selesai_perbaikan)"));

		// -------------------------statisti

		$click = DB::SELECT(DB::raw("SELECT COUNT(peminjaman_ruangan.tanggal_peminjaman) as jmlhpeminjam FROM ruangan JOIN peminjaman_ruangan ON ruangan.id = peminjaman_ruangan.ruangan_id JOIN gedung on ruangan.gedung_id=gedung.id GROUP BY ruangan.nama, YEAR(peminjaman_ruangan.tanggal_peminjaman)"));
	    $click = array_column($click, 'jmlhpeminjam');
	    
	    $viewer = DB::SELECT(DB::raw("SELECT COUNT(perbaikan_ruangan.id) as jmlhperbaikan FROM ruangan JOIN perbaikan_ruangan ON ruangan.id = perbaikan_ruangan.ruangan_id JOIN gedung on ruangan.gedung_id=gedung.id GROUP BY ruangan.nama, YEAR(perbaikan_ruangan.tanggal_selesai_perbaikan)"));
	    $viewer = array_column($viewer, 'jmlhperbaikan');

	    return view('admin.statis.index', compact('peminjaman','perbaikan'))
	            ->with('click',json_encode($click,JSON_NUMERIC_CHECK))
	            ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK));


    }
}
