<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeminjamanRuangan;
use App\Ruangan;
use App\User;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = PeminjamanRuangan::all();

        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruangan = Ruangan::pluck('nama','id');
        $user = User::pluck('username','id');
        $peminjam_id=null;
        $id_ruangan=null;
        return view('admin.peminjaman.create',compact('ruangan','id_ruangan','user','peminjam_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_peminjam' => 'required',
            'id_ruangan' => 'required',
            'tanggal_pengajuan' => 'required',
            'tanggal_peminjaman' => 'required',
            
            'jam_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'jam_selesai' => 'required',
            'peminjaman_status' => 'required',
            'tujuan' => 'required',
    
        ]);
        $peminjamanRuangan=new PeminjamanRuangan();
        $peminjamanRuangan->ruangan_id = $request->id_ruangan;
        $peminjamanRuangan->peminjam_id =$request->id_peminjam;
        $peminjamanRuangan->pengaju=$request->pengaju;
        $peminjamanRuangan->tanggal_pengajuan =$request->tanggal_pengajuan;
        $peminjamanRuangan->tanggal_peminjaman =$request->tanggal_peminjaman;
        $peminjamanRuangan->jam_mulai =$request->jam_mulai;
        $peminjamanRuangan->tanggal_selesai =$request->tanggal_selesai;
        $peminjamanRuangan->jam_selesai =$request->jam_selesai;
        $peminjamanRuangan->peminjaman_status_id=$request->peminjaman_status_id;
        $peminjamanRuangan->tujuan =$request->tujuan;
       if ($peminjamanRuangan->save()) {
            toast()->success('Berhasil menambahkan data peminjaman');
            return redirect()->route('peminjaman.index');
        } else {
            toast()->error('Data peminjaman tidak dapat ditambahkan');
            return redirect()->route('peminjaman.create');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = PeminjamanRuangan::find($id);
        $ruangan = Ruangan::pluck('nama','id');
        $user = User::pluck('username','id');
        $peminjam_id=$peminjaman->peminjam_id;
        $id_ruangan=$peminjaman->ruangan_id;

        return view('admin.peminjaman.edit', compact('ruangan','id_ruangan','user','peminjam_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'id_peminjam' => 'required',
            'id_ruangan' => 'required',
            'tanggal_pengajuan' => 'required',
            'tanggal_peminjaman' => 'required',
            
            'jam_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'jam_selesai' => 'required',
            'peminjaman_status' => 'required',
            'tujuan' => 'required',
    
        ]);
        $peminjaman = PeminjamanRuangan::find($id);
        $peminjamanRuangan->ruangan_id = $request->id_ruangan;
        $peminjamanRuangan->peminjam_id =$request->id_peminjam;
        $peminjamanRuangan->pengaju=$request->pengaju;
        $peminjamanRuangan->tanggal_pengajuan =$request->tanggal_pengajuan;
        $peminjamanRuangan->tanggal_peminjaman =$request->tanggal_peminjaman;
        $peminjamanRuangan->jam_mulai =$request->jam_mulai;
        $peminjamanRuangan->tanggal_selesai =$request->tanggal_selesai;
        $peminjamanRuangan->jam_selesai =$request->jam_selesai;
        $peminjamanRuangan->peminjaman_status_id=$request->peminjaman_status_id;
        $peminjamanRuangan->tujuan =$request->tujuan;
       if ($peminjamanRuangan->save()) {
            toast()->success('Berhasil mengubah data peminjaman');
            return redirect()->route('peminjaman.index');
        } else {
            toast()->error('Data peminjaman tidak dapat ubah');
            return redirect()->route('peminjaman.create');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $peminjaman = PeminjamanRuangan::find($id);
        $peminjaman->delete();
        toast()->success('Data peminjaman berhasil dihapus');

        return redirect()->route('peminjaman.index');
    }
}
