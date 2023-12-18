<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'id_surat_masuk' => 'required|exists:tb_surat_masuk,id',
            'isi_disposisi' => 'required|max:128',
            'tujuan' => 'required',
        ]);

        $dari = auth()->user()->roles->first()->name;

        Disposisi::create([
            'id_surat_masuk' => $request->input('id_surat_masuk'),
            'isi_disposisi' => $request->input('isi_disposisi'),
            'tujuan' => $request->input('tujuan'),
            'dari' => $dari,
        ]);

        return redirect()->back()->with('success', 'Disposisi created successfully!');
    }
}
