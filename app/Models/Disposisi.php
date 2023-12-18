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
        'isi_disposisi',
        'dari',
        'tujuan',
    ];

    // Define the relationship with Smasuk
    public function smasuk()
    {
        return $this->hasMany(Smasuk::class, 'id_surat_masuk');
    }
}