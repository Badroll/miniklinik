<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $fillable = [
        'no_rm',
        'nama',
        'tgl_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
    ];

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, "pasien_id", "id");
    }
    
}
