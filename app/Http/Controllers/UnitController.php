<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Unit;
use Spatie\Permission\Models\Role;
use Illuminate\Http\File;

class UnitController extends Controller
{
    public function index()
    {
        $Units=Unit::all();

        return view('admin.Units.index',compact('Units'));
    }
    public function show($id)
    {
        $Unit=Unit::find($id);
        // $roles = $Unit->getRoleNames();
        return view('admin.Units.show',compact('Unit'));
    }
     public function edit($id)
    {   
        $Unit=Unit::find($id);
        $induk = unit::select('id', 'nama')->pluck('nama', 'id')->sortBy('nama');   
        return view('admin.units.edit',compact('Unit','induk'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'tanggal_berdiri' => 'required|date|date_format:Y-m-d',
            'unit_induk_id' => 'required'
        ]);

        $Unit = unit::find($id);
        $Unit->nama = $request->input('nama');
        $Unit->keterangan = $request->input('keterangan');
        $Unit->tanggal_berdiri = $request->input('tanggal_berdiri');
        $Unit->unit_induk_id = $request->input('unit_induk_id');

        if ($Unit->save()) {
            toast()->success('Berhasil memperbaharui data unit');
            return redirect()->route('units.index');
        } else {
            toast()->error('Data Unit tidak dapat diperbaharui');
            return redirect()->route('users.edit', ['id' => $user->id]);
        }
    }

   public function create()
    {
        $induk = unit::select('id', 'nama')->pluck('nama', 'id')->sortBy('nama');   
        return view('admin.units.create', compact('induk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'tanggal_berdiri' => 'required|date|date_format:Y-m-d',
            'unit_induk_id' => 'required'
        ]);

        $Unit = new Unit();
        $Unit->nama = $request->input('nama');
        $Unit->keterangan = $request->input('keterangan');
        $Unit->tanggal_berdiri = $request->input('tanggal_berdiri');
        $Unit->unit_induk_id = $request->input('unit_induk_id');

        if ($Unit->save()) {
            toast()->success('Berhasil menambahkan data unit');
            return redirect()->route('units.index');
        } else {
            toast()->error('Data unit tidak dapat ditambahkan');
            return redirect()->route('units.create');
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
        $Unit = Unit::find($id);
        
        $Unit->delete();
        toast()->success('Data unit berhasil dihapus');
        return redirect()->route('units.index');
    }

    }
    // public function show($id)
    // {
    //     $user = User::find($id);
    //     $roles = $user->getRoleNames();
    //     return view('admin.users.show', compact('user', 'roles'));
    // }

    // public function edit($id)
    // {
    //     $user = User::find($id);
    //     if (empty($user->roles)) {
    //         $user_roles = $user->roles->first()->id;
    //     } else {
    //         $user_roles = null;
    //     }
    //     $roles = Role::all()->pluck('name', 'id');

    //     return view('admin.users.edit', compact('user', 'roles', 'user_roles'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'username' => 'required',
    //         'email' => 'required|email',
    //         'role' => 'required'
    //     ]);

    //     $user = User::find($id);
    //     $user->username = $request->input('username');
    //     $user->type = 3;
    //     $user->password = bcrypt($request->input('password'));
    //     $user->email = $request->input('email');

    //     if ($request->hasFile('avatar') && $request->input('avatar')->isvalid()) {
    //         $oldFile = $user->avatar;

    //         $path = config('central.path.avatars');

    //         $fileext = $request->photo->extension();
    //         $filename = uniqid("avatars-") . '.' . $fileext;

    //         //Real File
    //         $filepath = $request->file('photo')->storeAs($path, $filename, 'local');

    //         //Avatar File
    //         $realpath = storage_path('app/' . $filepath);
    //         Image::make($realpath)
    //             ->resize(null, 100, function ($constraint) {
    //                 $constraint->aspectRatio();
    //             })
    //             ->save(public_path(config('central.path.avatars') . '/' . $filename));

    //         $user->avatar = $filename;

    //         //Hapus avatar & Photo
    //         File::delete($realpath.'/' . $oldFile);
    //         File::delete(storage_path($path) . '/' . $oldFile);
    //     }

    //     if ($user->save()) {
    //         toast()->success('Berhasil memperbaharui data user');
    //         $user->syncRoles([$request->input('role')]);
    //         return redirect()->route('users.index');
    //     } else {
    //         toast()->error('Data user tidak dapat diperbaharui');
    //         return redirect()->route('users.edit', ['id' => $user->id]);
    //     }
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $user = User::find($id);
    //     $user->delete();
    //     toast()->success('Data user berhasil dihapus');

    //     return redirect()->route('users.index');
    // }

    // public function activate($id)
    // {
    //     $user = User::find($id);
    //     $user->status = 1;
    //     if ($user->save()) {
    //         toast()->success('Berhasil mengaktifkan user '.$user->username);
    //     } else {
    //         toast()->danger('Gagal mengaktifkan user '.$user->username);
    //     }
    //     return redirect()->route('users.index');
    // }

    // public function deactivate($id)
    // {
    //     $user = User::find($id);
    //     $user->status = 0;
    //     if ($user->save()) {
    //         toast()->success('Berhasil menonaktifkan user ' . $user->username);
    //     } else {
    //         toast()->danger('Gagal menonaktifkan user ' . $user->username);
    //     }
    //     return redirect()->route('users.index');
    // }

