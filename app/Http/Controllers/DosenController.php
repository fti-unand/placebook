<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Http\File;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = Dosen::all();

        return view ('dosen.index', compact('dosen','dosen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = DB::select('select users.username, users.id from users join dosen on 
            users.id = dosen.id where users.id IN (select dosen.id from dosen)');
       
        $edit=0;
        $user=User::pluck('username','id');
        return view('dosen.create',compact('dosen','user','edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $user = new User;
        $user->username = $request->nip;
        $user->email = "";
        $user->password = "";
        $user->type = 1;
        $user->status = 0;
        $user->avatar = 0;
        $user->first_login = 0;
        $user->save();

        $newuser = User::where('username', '=',$user->username)->first();

        $input = $request->all();
        $dosen = new Dosen;
        $dosen->id = $newuser->id;
        $dosen->nama = $request->nama;
        $dosen->nip = $request->nip;
        $dosen->nidn = $request->nidn;
        $dosen->gelar_depan = $request->gelar_depan;
        $dosen->gelar_belakang = $request->gelar_belakang;
        $dosen->nohp = $request->nohp;
        $dosen->tempat_lahir = $request->tempat_lahir;
        $dosen->tanggal_lahir = $request->tanggal_lahir;
        $dosen->jenis_kelamin = $request->jenis_kelamin;

        $newdosen = Dosen::where('id', '=',$dosen->id)->first();
        
        if($newdosen===NULL){
            $dosen->save();
            return view('dosen.show',compact('dosen'));
        }
        else{
            Session::flash('flash_message','Dosen sudah terdaftar.');
            $edit=0;
            $user=User::pluck('username','id');

            return view('dosen.create',compact('dosen','user','edit'));
        }

        


        //return;
        
        
        
        
        
        

        // dd($dosen);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
         $dosen = Dosen::where('id',$id)->first();
         // dd($dosen);
        return view('dosen.show', compact('dosen', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dosen = Dosen::find($id);
        $edit=1;
        $user=User::where('id',$id)->first();
        if (empty($dosen->id)) {
            return view('dosen.show');
        }
        return view('dosen.edit', compact('dosen','user','edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate
        ([
            'nama' => 'required',
            'nip' => 'required',
            'nidn' => 'required',
            //'gelar_depan' => 'required',
            //'gelar_belakang' => 'required',
             'nohp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        $dosen = Dosen::find($id);
        $dosen->nama = $request->input('nama');
        $dosen->nip = $request->input('nip');
        $dosen->nidn = $request->input('nidn');
        $dosen->gelar_depan = $request->input('gelar_depan');
        $dosen->gelar_belakang = $request->input('gelar_belakang');
        $dosen->nohp = $request->input('nohp');
        $dosen->tempat_lahir = $request->input('tempat_lahir');
        $dosen->tanggal_lahir = $request->input('tanggal_lahir');
        $dosen->jenis_kelamin = $request->input('jenis_kelamin');
        
        if ($dosen->save()) {
            toast()->success('Berhasil mengubah data profil pribadi Anda');
            return redirect()->route('dosen.index');
        }
        else{
            toast()->error('Data tidak dapat diubah');
            return redirect()->route('dosen.edit', ['id'=>$dosen->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::find($id);
        $dosen->delete();
        toast()->success('Data berhasil dihapus');
        return redirect()->route('dosen.index');
    }
}
