<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fasilitas;
use DB;

class fasilitasController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $fas = fasilitas::where('id','=','4')->pluck('nama','nama');;
        // dd($fas);
    	$fasilitas = fasilitas::all();
        return view('fasilitas.index',compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fasilitas.create');
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
            'nama' => 'required',
        ]);

        $fasi = new fasilitas;
        $fasi->nama = $request->nama;
        $fasi->save();
        return redirect()->route('fasilitas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $detail = fasilitas::find($id);
       $tampil = DB::select(DB::raw(" SELECT ruangan.nama as nmruangan, ruangan_fasilitas.jumlah from ruangan_fasilitas join fasilitas on ruangan_fasilitas.fasilitas_id = fasilitas.id join ruangan on ruangan_fasilitas.ruangan_id = ruangan.id where ruangan_fasilitas.id = '$id' "));
       // dd($tampil);
        return view('fasilitas.show', compact('detail','tampil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fasilitas = fasilitas::find($id);
        return view('fasilitas.edit')->with('fasilitas', $fasilitas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $fasi = fasilitas::find($id);
        $fasi->nama = $request->nama;
        $fasi->save();
        $fasilitas = fasilitas::all();
        return view('fasilitas.index',compact('fasilitas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fasi = fasilitas::find($id);
        $fasi->delete();
        return redirect()->route('fasilitas.index');
    }
}
