<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smasuk extends Model
{
    use HasFactory;

    protected $table = 'tb_surat_masuk';
    protected $primaryKey = "id";
    protected $fillable = [
        'tgl_surat',
        'no_surat',
        'sifat',
        'pengirim',
        'perihal',
        'isi_surat',
        'file',
    ];

    public function disposisi()
    {
        return $this->hasOne(Disposisi::class, 'id_surat_masuk');
    }
}
