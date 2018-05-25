<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;
use App\Ruangan;
use App\RuanganKondisi;
use App\RuanganFungsi;
use App\RuanganFasilitas;
use App\Unit;
use App\Gedung;


class RuanganController extends Controller
{
    public function index()
    {
        $ruangans = Ruangan::all();

        return view('ruangan.index', compact('ruangans'));
    }

    public function create()
    {
        $kondisis = RuanganKondisi::all()->pluck('nama', 'id');
        $fungsis = RuanganFungsi::all()->pluck('nama', 'id');
        $pengelolas = Unit::all()->pluck('nama', 'id');
        $gedungs = Gedung::all()->pluck('nama', 'id');

        return view('ruangan.create', compact('kondisis','fungsis', 'bisa_dipinjams', 'pengelolas', 'gedungs'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $ruangan = new Ruangan;

        $ruangan->gedung_id = $request->gedung_id;
        $ruangan->nama = $request->nama;
        $ruangan->luas = $request->luas;
        $ruangan->lantai = $request->lantai;
        $ruangan->bisa_dipinjam = $request->bisa_dipinjam;
        $ruangan->ruangan_kondisi_id = $request->kondisi;
        $ruangan->ruangan_fungsi_id = $request->fungsi;
        $ruangan->unit_pengelola_id = $request->unit_pengelola_id;
        $ruangan->created_at = date(now());

        $ruangan->save();
        return view('ruangan.show', compact('ruangan'));
    }

    public function show($id)
    {
        $ruangan = Ruangan::find($id);
        // $rf = RuanganFasilitas::with(['ruangan','fasilitas'])->pluck('nama');
        $rf = DB::table('ruangan')->join('ruangan_fasilitas', 'ruangan.id', '=', 'ruangan_fasilitas.ruangan_id')->join('fasilitas', 'ruangan_fasilitas.fasilitas_id', '=', 'fasilitas.id')->where('ruangan.id','=',$id)->select('fasilitas.nama')->pluck('nama');

        return view('ruangan.show', compact('ruangan', 'rf'));
    }

    public function edit($id)
    {
        $ruangan = Ruangan::find($id);

        if (empty($ruangan->id)) 
        {
            return view('ruangan.show');
        }

        $kondisis = RuanganKondisi::all()->pluck('nama', 'id');
        $fungsis = RuanganFungsi::all()->pluck('nama', 'id');
        $pengelolas = Unit::all()->pluck('nama', 'id');
        $gedungs = Gedung::all()->pluck('nama', 'id');
        
        return view('ruangan.edit', compact('ruangan','kondisis','fungsis', 'bisa_dipinjams', 'pengelolas', 'gedungs'));
    }

    public function update(Request $request, $id)
    {

        
        $request->validate
        ([
            'gedung_id' => 'required',
            'nama' => 'required',
            'luas' => 'required',
            'lantai' => 'required',
            'bisa_dipinjam' => 'required',
            'kondisi' => 'required',
            'fungsi' => 'required',
            'unit_pengelola_id' => 'required'
        ]);

        $ruangan = Ruangan::find($id);
        $ruangan->gedung_id = $request->input('gedung_id');
        $ruangan->nama = $request->input('nama');
        $ruangan->luas = $request->input('luas');
        $ruangan->lantai = $request->input('lantai');
        $ruangan->bisa_dipinjam = $request->input('bisa_dipinjam');
        $ruangan->ruangan_kondisi_id = $request->input('kondisi');
        $ruangan->ruangan_fungsi_id = $request->input('fungsi');
        $ruangan->unit_pengelola_id = $request->input('unit_pengelola_id');
        $ruangan->updated_at = date(now());


        if ($ruangan->save()) {
            toast()->success('Berhasil memperbaharui data ruangan');
            return redirect()->route('ruangan.index');
        } else {
            toast()->error('Data ruangan tidak dapat diperbaharui');
            return redirect()->route('ruangan.edit', ['id' => $ruangan->id]);
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
        $ruangan = Ruangan::find($id);
        $ruangan->delete();
        toast()->success('Data ruangan berhasil dihapus');

        return redirect()->route('ruangan.index');
    }
}
