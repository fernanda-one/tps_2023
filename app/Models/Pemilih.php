<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    protected $table = 'pemilih';
    protected $guarded = [
        'id'
    ];

    public function users()
    {
        return $this->belongsTo(Users::class, 'created_by', 'id');
    }

    public function createdByUser()
    {
        return $this->belongsTo(Users::class, 'created_by');
    }
}
