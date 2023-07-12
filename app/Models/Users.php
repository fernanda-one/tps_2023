<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'img_url',
        'password',
        'salt',
        'status',
        'role_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
