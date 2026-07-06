<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $table = 'kunjungan';

    protected $fillable = [
        'tanggal',
        'keluhan',
        'diagnosis',
        'biaya',
        'status',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, "pasien_id", "id");
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, "pasien_id", "id");
    }

}
