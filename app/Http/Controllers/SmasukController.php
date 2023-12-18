<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\Smasuk;

class SmasukController extends Controller
{
    public function index()
    {
        $Smasuk = Smasuk::all();
        $disposisi = Disposisi::all();
        $jabatan = Jabatan::all();
        // dd($Smasuk);

        return view('surat_masuk.index', compact('Smasuk', 'disposisi', 'jabatan'));
    }

    public function view($id)
    {
        $Smasuk = Smasuk::find($id);
        $disposisi = $Smasuk->disposisi;

        return view('surat_masuk.view', compact('Smasuk', 'disposisi'));
    }


    public function create()
    {
        $Smasuk = Smasuk::all();

        return view('surat_masuk.create', compact('Smasuk'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'tgl_surat' => 'required',
            'no_surat' => 'required',
            'sifat' => 'required',
            'pengirim' => 'required',
            'perihal' => 'required',
            'isi_surat' => 'required',
            'file' => 'file|mimes:png,jpg,jpeg,pdf,doc,xls',
        ]);

        // Handle file upload if a file is provided
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/file/'), $fileName);

            // Create a new Smasuk instance
            $Smasuk = new Smasuk([
                'tgl_surat' => $request->input('tgl_surat'),
                'no_surat' => $request->input('no_surat'),
                'sifat' => $request->input('sifat'),
                'pengirim' => $request->input('pengirim'),
                'perihal' => $request->input('perihal'),
                'isi_surat' => $request->input('isi_surat'),
                'file' => $fileName,
                'disposisi' => 'kepala',
            ]);

            $Smasuk->save();

            // Redirect back with a success message
            return redirect()->route('surat_masuk.index')->with('success', 'Surat Masuk added successfully');
        } else {
            // Handle the case where no file is provided
            return redirect()->back()->with('error', 'Please provide a file');
        }
    }


    // public function edit(User $user)
    // {
    //     $roles = Role::all();

    //     return view('user_management.edit', compact('user', 'roles'));
    // }


    // public function update(Request $request, User $user)
    // {
    //     // Validasi input, sesuaikan sesuai kebutuhan
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email,' . $user->id,
    //         'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     // Menyimpan informasi pengguna
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');

    //     // Menyimpan foto profil jika diunggah
    //     if ($request->hasFile('avatar')) {
    //         $image = $request->file('avatar');
    //         $fileName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('assets/images/avatar/'), $fileName);
    //         $user->avatar = $fileName;
    //     }

    //     $user->save();

    //     return redirect()->route('admin.user.index')->with('success', 'Profil berhasil diperbarui');
    // }

    // public function destroy(User $user)
    // {
    //     // Check if the user has a profile image and it is not the default image
    //     if ($user->avatar && $user->avatar !== 'default.png') {
    //         $imagePath = public_path('assets/images/avatar/' . $user->avatar);

    //         // Check if the file exists before attempting to delete it
    //         if (file_exists($imagePath)) {
    //             unlink($imagePath);
    //         }
    //     }

    //     // Delete the obat record from the database
    //     $user->delete();

    //     return redirect()->route('user_management.index')
    //         ->with('success', 'User deleted successfully');
    // }
}
