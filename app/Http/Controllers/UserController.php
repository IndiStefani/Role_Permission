<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Role;


class UserController extends Controller
{
    public function index()
    {
        $this->authorize('read role');
        $users = User::all();

        return view('user_management.index', compact('users'));
    }

    public function profile()
    {
        $users = User::all();

        return view('user_management.profile', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $jabatan = Jabatan::all();

        return view('user_management.create', compact('roles', 'jabatan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'id_jabatan' => 'required',
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $namaavatar = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('assets/images/avatar/'), $namaavatar); // Simpan avatar di direktori publik
        } else {
            $namaavatar = 'default.png'; // Jika tidak ada avatar yang diunggah
        }


        // Buat instance User
        $user = new User([
            'avatar' => $namaavatar,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'id_jabatan' => $request->input('id_jabatan'),
        ]);

        // Simpan user ke database
        $user->assignRole($request->input('role'));
        $user->save();

        // Redirect ke halaman user management atau halaman lain yang sesuai
        return redirect()->route('user_management.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $jabatan = Jabatan::all();

        return view('user_management.edit', compact('user', 'roles', 'jabatan'));
    }


    public function update(Request $request, User $user)
    {
        // Validasi input, sesuaikan sesuai kebutuhan
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_jabatan' => 'required',
        ]);

        // Menyimpan informasi pengguna
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->id_jabatan = $request->input('id_jabatan');

        // Menyimpan foto profil jika diunggah
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/avatar/'), $fileName);
            $user->avatar = $fileName;
        }

        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Profil berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        // Check if the user has a profile image and it is not the default image
        if ($user->avatar && $user->avatar !== 'default.png') {
            $imagePath = public_path('assets/images/avatar/' . $user->avatar);

            // Check if the file exists before attempting to delete it
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the obat record from the database
        $user->delete();

        return redirect()->route('user_management.index')
            ->with('success', 'User deleted successfully');
    }
}
