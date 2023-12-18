<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\Jabatan;
use App\Models\Smasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            ]);

            $Smasuk->save();

            // Redirect back with a success message
            return redirect()->route('surat_masuk.index')->with('success', 'Surat Masuk added successfully');
        } else {
            // Handle the case where no file is provided
            return redirect()->back()->with('error', 'Please provide a file');
        }
    }


    public function edit($id)
    {
        $Smasuk = Smasuk::find($id);

        return view('surat_masuk.edit', compact('Smasuk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_surat' => 'required',
            'no_surat' => 'required',
            'sifat' => 'required',
            'pengirim' => 'required',
            'perihal' => 'required',
            'isi_surat' => 'required',
            'file' => 'file|mimes:png,jpg,jpeg,pdf,doc,xls',
        ]);

        $Smasuk = Smasuk::find($id);

        if ($Smasuk) {
            // Handle file upload if a file is provided
            if ($request->hasFile('file')) {
                // Your file upload code here
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/file/'), $fileName);

                // Delete the old file if it exists
                if ($Smasuk->file) {
                    $oldFilePath = public_path('assets/file/' . $Smasuk->file);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                // Update the file property in the Smasuk model
                $Smasuk->file = $fileName;
            }

            // Update other fields
            $Smasuk->tgl_surat = $request->input('tgl_surat');
            $Smasuk->no_surat = $request->input('no_surat');
            $Smasuk->sifat = $request->input('sifat');
            $Smasuk->pengirim = $request->input('pengirim');
            $Smasuk->perihal = $request->input('perihal');
            $Smasuk->isi_surat = $request->input('isi_surat');

            $Smasuk->save();

            return redirect()->route('surat_masuk.index')->with('success', 'Surat Masuk updated successfully');
        } else {
            return redirect()->back()->with('error', 'Smasuk not found');
        }
    }


    public function destroy(Smasuk $Smasuk)
    {
        // Hapus file jika ada
        if ($Smasuk->file) {
            $filePath = public_path('assets/file/' . $Smasuk->file);

            // Check if the file exists before attempting to delete it
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Hapus Smasuk dari database
        $Smasuk->delete();

        return redirect()->route('surat_masuk.index')->with('success', 'Surat Masuk deleted successfully');
    }
}
