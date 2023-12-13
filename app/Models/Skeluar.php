<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skeluar extends Model
{
    use HasFactory;

    protected $table = 'tb_surat_keluar';

    protected $fillable = [
        'tgl_surat',
        'no_surat',
        'sifat',
        'pengirim',
        'perihal',
        'tujuan',
        'alamat',
        'isi_surat',
        'file',
        'disposisi',
    ];
}
