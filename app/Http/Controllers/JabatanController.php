<?php

// app/Http/Controllers/JabatanController.php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $this->authorize('read role');
        $jabatan = Jabatan::all();
        return view('jabatan.index', compact('jabatan'));
    }

    public function create()
    {
        return view('jabatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_jabatan' => 'required',
        ]);

        $latestJabatan = Jabatan::latest('kd_jabatan')->first();
        $number = ($latestJabatan) ? (int)substr($latestJabatan->kd_jabatan, 2) + 1 : 1;
        $formattedNumber = str_pad($number, 4, '0', STR_PAD_LEFT);
        $kd_jabatan = 'J-' . $formattedNumber;

        $jabatan = new Jabatan([
            'kd_jabatan' => $kd_jabatan,
            'nm_jabatan' => $request->input('nm_jabatan'),
        ]);

        $jabatan->save();

        return redirect()->route('jabatan.index')->with('success', 'Jabatan created successfully');
    }

    public function edit(Jabatan $jabatan)
    {
        return view('jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'nm_jabatan' => 'required',
        ]);

        $jabatan->update([
            'nm_jabatan' => $request->input('nm_jabatan'),
        ]);

        return redirect()->route('jabatan.index')->with('success', 'Jabatan updated successfully');
    }

    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();

        return redirect()->route('jabatan.index')->with('success', 'Jabatan deleted successfully');
    }
}
