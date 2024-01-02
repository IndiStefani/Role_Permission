<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $table = 'tb_disposisi';
    protected $primaryKey = "id";
    protected $fillable = [
        'id_surat_masuk',
        'id_surat_keluar',
        'isi_disposisi',
        'dari',
        'tujuan',
    ];

    // Define the relationship with Smasuk
    public function smasuk()
    {
        return $this->belongsTo(Smasuk::class, 'id_surat_masuk');
    }

    public function skeluar()
    {
        return $this->belongsTo(Skeluar::class, 'id_surat_keluar');
    }
}