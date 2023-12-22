<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'tb_jabatan';
    protected $primaryKey = "id";
    protected $fillable = [
        'kd_jabatan',
        'nm_jabatan',
    ];

    public function smasuk()
    {
        return $this->hasMany(Jabatan::class, 'id_pengirim');
    }

    public function skeluar()
    {
        return $this->hasMany(Jabatan::class, 'id_pengirim');
    }
}
