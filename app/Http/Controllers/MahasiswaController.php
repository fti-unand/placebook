<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use App\User;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::paginate(10);
        return view('view_mahasiswa.index_mahasiswa', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        $user_roles = null;

        $email = $username = null;
        return view('view_mahasiswa.create_mahasiswa', compact('roles', 'user_roles', 'email', 'username'));
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
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'email' => 'required|email',
            'role' => 'required',
            'nama'      => 'required',
            'nim'       => 'required',
            'angkatan'  => 'required'
        ]);

        $user = new User();
        $user->username = $request->input('username');
        $user->type = 2;
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');

        if ($request->hasFile('avatar') && $request->input('avatar')->isvalid()) {
            $path = config('img.avatars');

            $fileext = $request->photo->extension();
            $filename = uniqid("avatars-") . '.' . $fileext;

            //Real File
            $filepath = $request->file('photo')->storeAs($path, $filename, 'local');

            //Avatar File
            $realpath = storage_path('public/' . $filepath);
            Image::make($realpath)
                ->resize(null, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path(config('img.avatars') . '/' . $filename));

            $user->avatar = $filename;
        }
        
        $user->save();

        $mahasiswa                  = new Mahasiswa();
        $mahasiswa->id = $user->id;
        $mahasiswa->nama            = $request->input('nama');
        $mahasiswa->nim             = $request->input('nim');
        $mahasiswa->angkatan        = $request->input('angkatan');
        $mahasiswa->tempat_lahir    = $request->input('tempat_lahir');
        $mahasiswa->tanggal_lahir   = $request->input('tanggal_lahir');
        $mahasiswa->jenis_kelamin   = $request->input('jenis_kelamin');
        $mahasiswa->nohp            = $request->input('nohp');
        $mahasiswa->jalur_masuk     = $request->input('jalur_masuk');
        $mahasiswa->status_masuk    = $request->input('status_masuk');

        if($mahasiswa->save())
        {
            toast()->success('Data Mahasiswa berhasil ditambahkan');
            $user->assignRole($request->input('role'));
            return redirect()->route('mahasiswa.index');
        }
        else
        {
            toast()->error('Data Mahasiswa gagal ditambahkan');
            return redirect()->route('Mahasiswa.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $user = User::find($id);
        $roles = $user->getRoleNames();


        //jenis_kelamin
        if ($mahasiswa->jenis_kelamin == 1)
        {
            $jenis_kelamin = 'Laki-laki';
        }
        else if($mahasiswa->jenis_kelamin == 2)
        {
            $jenis_kelamin = 'Perempuan';
        }
        else
        {
            $jenis_kelamin = null;
        }

        //jalur_masuk
        if ($mahasiswa->jalur_masuk == 1)
        {
            $jalur_masuk = 'SNMPTN';
        }
        else if($mahasiswa->jalur_masuk == 2)
        {
            $jalur_masuk = 'SBMPTN';
        }
        else if($mahasiswa->jalur_masuk == 3)
        {
            $jalur_masuk = 'Mandiri';
        }
        else
        {
            $jalur_masuk = null;
        }

        //status_masuk
        if($mahasiswa->status_masuk == 1)
        {
            $status_masuk = 'Baru';
        }
        else if($mahasiswa->status_masuk == 2)
        {
            $status_masuk = 'Pindahan';
        }
        else
        {
            $status_masuk = null;
        }

        return view('view_mahasiswa.show_mahasiswa', compact('mahasiswa', 'roles', 'jenis_kelamin', 'jalur_masuk', 'status_masuk'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $user = User::find($id);
        if(empty($user->roles))
        {
            $user_roles = $user_roles->first()->id;
        }
        else
        {
            $user_roles = null;
        }
        $roles = Role::all()->pluck('name', 'id');


        if(!empty($mahasiswa->user['email']))
        {
            $email = $mahasiswa->user['email'];
        }
        else
        {
            $email = null;
        }

        if(!empty($mahasiswa->user['username']))
        {
            $username = $mahasiswa->user['username'];
        }
        else
        {
            $username = null;
        }

        return view('view_mahasiswa.edit_mahasiswa', compact('mahasiswa', 'roles', 'user_roles', 'email', 'username'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'email' => 'required|email',
            'role' => 'required',
            'nama'      => 'required',
            'nim'       => 'required',
            'angkatan'  => 'required'
        ]);

        $user = User::find($id);
        $user->username = $request->input('username');
        $user->type = 2;
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');

        if ($request->hasFile('avatar') && $request->input('avatar')->isvalid()) {
            $path = config('central.path.avatars');

            $fileext = $request->photo->extension();
            $filename = uniqid("avatars-") . '.' . $fileext;

            //Real File
            $filepath = $request->file('photo')->storeAs($path, $filename, 'local');

            //Avatar File
            $realpath = storage_path('app/' . $filepath);
            Image::make($realpath)
                ->resize(null, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path(config('central.path.avatars') . '/' . $filename));

            $user->avatar = $filename;

            //Hapus avatar & Photo
            File::delete($realpath.'/' . $oldFile);
            File::delete(storage_path($path) . '/' . $oldFile);
        }
        
        $user->save();

        $mahasiswa                  = Mahasiswa::find($id);
        $mahasiswa->nama            = $request->input('nama');
        $mahasiswa->nim             = $request->input('nim');
        $mahasiswa->angkatan        = $request->input('angkatan');
        $mahasiswa->tempat_lahir    = $request->input('tempat_lahir');
        $mahasiswa->tanggal_lahir   = $request->input('tanggal_lahir');
        $mahasiswa->jenis_kelamin   = $request->input('jenis_kelamin');
        $mahasiswa->nohp            = $request->input('nohp');
        $mahasiswa->jalur_masuk     = $request->input('jalur_masuk');
        $mahasiswa->status_masuk    = $request->input('status_masuk');

        if($mahasiswa->save())                    
        {
            toast()->success('Data Mahasiswa berhasil diperbaharui');
            $user->syncRoles([$request->input('role')]);
            return redirect()->route('mahasiswa.index');
        }
        else
        {
            toast()->error('Data Mahasiswa gagal diperbaharui');
            return redirect()->route('mahasiswa.edit', ['id' => $mahasiswa->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        $user = User::find($id);
        $user->delete();
        toast()->success('Data mahasiswa berhasil dihapus');

        return redirect()->route('mahasiswa.index');
    }
}
