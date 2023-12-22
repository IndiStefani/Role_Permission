<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Skeluar;
use Illuminate\Http\Request;

class SkeluarController extends Controller
{
    public function index()
    {
        $Skeluar = Skeluar::all();
        return view('surat_keluar.index', compact('Skeluar'));
    }

    public function view($id)
    {
        $Skeluar = Skeluar::find($id);
        return view('surat_keluar.view', compact('Skeluar'));
    }

    public function create()
    {
        $jabatan = Jabatan::all();

        return view('surat_keluar.create', compact('jabatan'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'tgl_surat' => 'required',
            'no_surat' => 'required',
            'sifat' => 'required',
            'id_pengirim' => 'required',
            'perihal' => 'required',
            'tujuan' => 'required',
            'alamat' => 'required',
            'isi_surat' => 'required',
            'file' => 'file|mimes:png,jpg,jpeg,pdf,doc,xls',
        ]);
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/file/'), $fileName);

            // Create a new Smasuk instance
            $Skeluar = new Skeluar([
                'tgl_surat' => $request->input('tgl_surat'),
                'no_surat' => $request->input('no_surat'),
                'sifat' => $request->input('sifat'),
                'id_pengirim' => $request->input('id_pengirim'),
                'perihal' => $request->input('perihal'),
                'tujuan' => $request->input('tujuan'),
                'alamat' => $request->input('alamat'),
                'isi_surat' => $request->input('isi_surat'),
                'file' => $fileName,
            ]);

            // Process the form data and store it in the database
            $Skeluar->save();

            // Redirect back with a success message
            // Redirect back with a success message
            return redirect()->route('surat_keluar.index')->with('success', 'Surat Masuk added successfully');
        } else {
            // Handle the case where no file is provided
            return redirect()->back()->with('error', 'Please provide a file');
        }
    }


    public function edit($id)
    {
        $Skeluar = Skeluar::find($id);
        return view('surat_keluar.edit', compact('Skeluar'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            // Add validation rules based on your requirements
        ]);

        // Update the Skeluar instance in the database
        $Skeluar = Skeluar::find($id);
        $Skeluar->update($request->all());

        // Redirect back with a success message
        return redirect()->route('surat_keluar.index')->with('success', 'Surat Keluar updated successfully');
    }

    public function destroy($id)
    {
        // Delete the Skeluar instance from the database
        Skeluar::destroy($id);

        // Redirect back with a success message
        return redirect()->route('surat_keluar.index')->with('success', 'Surat Keluar deleted successfully');
    }
}
