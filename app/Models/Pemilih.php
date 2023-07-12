<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    protected $table = 'pemilih';
    protected $fillable = [
        'name',
        'phone_number',
        'nik',
        'alamat',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'lokasi_tps',
        'keterangan',
        'status',
        'created_by',
    ];

    public function createdByUser()
    {
        return $this->belongsTo(Users::class, 'created_by');
    }
}
