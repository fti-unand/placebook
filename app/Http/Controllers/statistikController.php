<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class statistikController extends Controller
{
    public function gabungtable()
    {

  //       $tbpeminjam = DB::table('peminjaman_ruangan')->where('tanggal_peminjaman',2018)->count();
  //       $tbpeminjam2 = DB::table('peminjaman_ruangan')->where('tanggal_peminjaman',2018)->count();
  //       $tbperbaikan = DB::table('perbaikan_ruangan')->where('pengaju_id',0)->count();
  //       $tbperbaikan2 = DB::table('perbaikan_ruangan')->where('pengaju_id',1)->count();
		// $tahun = DB::SELECT("SELECT substr(CURRENT_DATE,1,4) as tahun");
		$peminjaman = DB::SELECT(DB::raw("SELECT substr(peminjaman_ruangan.tanggal_peminjaman,1,4) as tahun, gedung.nama as gedung, ruangan.nama as ruangana, COUNT(peminjaman_ruangan.tanggal_peminjaman) as jmlhpeminjam FROM ruangan JOIN peminjaman_ruangan ON ruangan.id = peminjaman_ruangan.ruangan_id JOIN gedung on ruangan.gedung_id=gedung.id GROUP BY ruangan.nama, YEAR(peminjaman_ruangan.tanggal_peminjaman)"));

		$perbaikan = DB::SELECT(DB::raw("SELECT substr(perbaikan_ruangan.tanggal_selesai_perbaikan,1,4) as tahun, gedung.nama as gedung, ruangan.nama as ruangana, COUNT(perbaikan_ruangan.id) as jmlhperbaikan FROM ruangan JOIN perbaikan_ruangan ON ruangan.id = perbaikan_ruangan.ruangan_id JOIN gedung on ruangan.gedung_id=gedung.id GROUP BY ruangan.nama, YEAR(perbaikan_ruangan.tanggal_selesai_perbaikan)"));

		// -------------------------statisti

		$viewer = DB::SELECT(DB::raw("SELECT COUNT(peminjaman_ruangan.tanggal_peminjaman) as jmlhpeminjam FROM ruangan JOIN peminjaman_ruangan ON ruangan.id = peminjaman_ruangan.ruangan_id JOIN gedung on ruangan.gedung_id=gedung.id GROUP BY ruangan.nama, YEAR(peminjaman_ruangan.tanggal_peminjaman)"));
	    $viewer = array_column($viewer, 'jmlhpeminjam');
	    
	    $click = DB::SELECT(DB::raw("SELECT COUNT(perbaikan_ruangan.id) as jmlhperbaikan FROM ruangan JOIN perbaikan_ruangan ON ruangan.id = perbaikan_ruangan.ruangan_id JOIN gedung on ruangan.gedung_id=gedung.id GROUP BY ruangan.nama, YEAR(perbaikan_ruangan.tanggal_selesai_perbaikan)"));
	    $click = array_column($click, 'jmlhperbaikan');
	    // $click = Click::select(DB::raw("SUM(numberofclick) as count"))
	    //     ->orderBy("created_at")
	    //     ->groupBy(DB::raw("year(created_at)"))
	    //     ->get()->toArray();
	    // $click = array_column($click, 'count');
	    return view('admin.statis.index', compact('peminjaman','perbaikan'))
	            ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))
	            ->with('click',json_encode($click,JSON_NUMERIC_CHECK));


    }

    // function bar(){
    //     $votes  =  \Lava::DataTable();

    //     $dataSiswa = DB::table('siswas')->groupBy('Nilai')->get();

    //     $votes->addStringColumn('Jumlah')
    //         ->addNumberColumn('Jumlah');
    //     foreach($dataSiswa as $siswa){
    //         $votes->addRow(array($siswa->Nilai,
    //             DB::table('siswas')->where('Nilai','=',$siswa->Nilai)->count()));
    //     }

    //     \Lava::BarChart('Jumlah')
    //         ->setOptions(array(
    //             'datatable' => $votes,
    //             'orientation' => 'horizontal',

    //         ));
    //     return view('pages.bar');
    // }
}
