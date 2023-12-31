<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::create([
            'name' => 'admin',
            'username'=>'admin',
            'email' => 'admin@gmail.com',
            'role_id'=> 1,
            'password' => Hash::make('admin123'),
        ]);
    }
}
