<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['superadmin', 'admin', 'enumerator'];

        foreach ($roles as $role) {
            DB::table('role')->insert([
                'name' => $role,
            ]);
        }
    }
}

