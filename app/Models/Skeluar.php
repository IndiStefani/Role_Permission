<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skeluar extends Model
{
    use HasFactory;

    protected $table = 'tb_surat_keluar';
    protected $primaryKey = "id";
    protected $fillable = [
        'tgl_surat',
        'no_surat',
        'sifat',
        'id_pengirim',
        'perihal',
        'tujuan',
        'alamat',
        'isi_surat',
        'file',
        'disposisi',
    ];

    public function pengirim()
    {
        return $this->belongsTo(Jabatan::class, 'id_pengirim');
    }

    public function disposisi()
    {
        return $this->hasOne(Disposisi::class, 'id_surat_keluar');
    }
}
