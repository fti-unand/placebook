<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
<<<<<<< HEAD
use DB;
=======
>>>>>>> ccd63fb1d63f106de579d2093d5d7c1acb8a47cd
use Spatie\Permission\Models\Role;
use Illuminate\Http\File;
use App\PerbaikanRuangan;

class RusakController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $rusaks = DB::SELECT(DB::raw("SELECT gedung.nama as gedung, ruangan.nama as ruangan, users.username, perbaikan_ruangan.tanggal_perbaikan, perbaikan_ruangan.tanggal_selesai_perbaikan, perbaikan_ruangan.alasan FROM perbaikan_ruangan JOIN ruangan on perbaikan_ruangan.ruangan_id=ruangan.id JOIN users on perbaikan_ruangan.pengaju_id=users.id JOIN gedung on ruangan.gedung_id=gedung.id"));
        return view('admin.rusaks.index', compact('rusaks'));
    }

    
=======
        $rusaks = PerbaikanRuangan::all();

        return view('admin.rusaks.index', compact('rusaks'));
    }

    public function create()
    {
    
        return view('admin.rusaks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        $user = new User();
        $user->username = $request->input('username');
        $user->type = 3;
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
        }

        if ($user->save()) {
            toast()->success('Berhasil menambahkan data user');
            $user->assignRole($request->input('role'));
            return redirect()->route('users.index');
        } else {
            toast()->error('Data user tidak dapat ditambahkan');
            return redirect()->route('users.create');
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        $roles = $user->getRoleNames();
        return view('admin.users.show', compact('user', 'roles'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (empty($user->roles)) {
            $user_roles = $user->roles->first()->id;
        } else {
            $user_roles = null;
        }
        $roles = Role::all()->pluck('name', 'id');

        return view('admin.users.edit', compact('user', 'roles', 'user_roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        $user = User::find($id);
        $user->username = $request->input('username');
        $user->type = 3;
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');

        if ($request->hasFile('avatar') && $request->input('avatar')->isvalid()) {
            $oldFile = $user->avatar;

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

        if ($user->save()) {
            toast()->success('Berhasil memperbaharui data user');
            $user->syncRoles([$request->input('role')]);
            return redirect()->route('users.index');
        } else {
            toast()->error('Data user tidak dapat diperbaharui');
            return redirect()->route('users.edit', ['id' => $user->id]);
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
        $user = User::find($id);
        $user->delete();
        toast()->success('Data user berhasil dihapus');

        return redirect()->route('users.index');
    }

    public function activate($id)
    {
        $user = User::find($id);
        $user->status = 1;
        if ($user->save()) {
            toast()->success('Berhasil mengaktifkan user '.$user->username);
        } else {
            toast()->danger('Gagal mengaktifkan user '.$user->username);
        }
        return redirect()->route('users.index');
    }

    public function deactivate($id)
    {
        $user = User::find($id);
        $user->status = 0;
        if ($user->save()) {
            toast()->success('Berhasil menonaktifkan user ' . $user->username);
        } else {
            toast()->danger('Gagal menonaktifkan user ' . $user->username);
        }
        return redirect()->route('users.index');
    }
>>>>>>> ccd63fb1d63f106de579d2093d5d7c1acb8a47cd
}