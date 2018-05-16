<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeminjamanRuangan;
use App\Ruangan;
use App\User;
use App\PeminjamanStatus;

class ProsesPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response


     */


    public function index()
    {
        $PeminjamanRuangan=PeminjamanRuangan::all();
        $ruangan=Ruangan::pluck('nama','id');
        $user=User::pluck('username','id');
        $status=PeminjamanStatus::pluck('nama','id');

       return view('prosespeminjaman.index',['PeminjamanRuangan'=>$PeminjamanRuangan],compact('ruangan','user','status'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PeminjamanRuangan=PeminjamanRuangan::find($id);
        $ruangan=Ruangan::pluck('nama','id');
        $user=User::pluck('username','id');
        $status=PeminjamanStatus::pluck('nama','id');

       return view('prosespeminjaman.show',['PeminjamanRuangan'=>$PeminjamanRuangan],compact('ruangan','user','status'));  


        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


     public function activate($id)
    {
        $PeminjamanRuangan = PeminjamanRuangan::find($id);
        $PeminjamanRuangan->peminjaman_status_id = 1;
        if ($PeminjamanRuangan->save()) {
            toast()->success('Berhasil Menyetujui ');
        } else {
            toast()->danger('Gagal Menyetujui  ');
        }
        return redirect()->route('prosespeminjamans.index');
    }

    public function deactivate($id)
    {
        $PeminjamanRuangan = PeminjamanRuangan::find($id);
        $PeminjamanRuangan->peminjaman_status_id = 2;
        if ($PeminjamanRuangan->save()) {
            toast()->success('Berhasil membatalkan persetujuan ' );
        } else {
            toast()->danger('Gagal membatalkan persetujuan ' );
        }
        return redirect()->route('prosespeminjamans.index');
    }

        public function activa($id)
    {
        $PeminjamanRuangan = PeminjamanRuangan::find($id);
        $PeminjamanRuangan->peminjaman_status_id = 1;
        if ($PeminjamanRuangan->save()) {
            toast()->success('Berhasil Menyetujui ');
        } else {
            toast()->danger('Gagal Menyetujui  ');
        }
        return redirect()->route('prosespeminjamans.show');
    }

    public function deactiva($id)
    {
        $PeminjamanRuangan = PeminjamanRuangan::find($id);
        $PeminjamanRuangan->peminjaman_status_id = 2;
        if ($PeminjamanRuangan->save()) {
            toast()->success('Berhasil membatalkan persetujuan ' );
        } else {
            toast()->danger('Gagal membatalkan persetujuan ' );
        }
        return redirect()->route('prosespeminjamans.show');
    }
}
