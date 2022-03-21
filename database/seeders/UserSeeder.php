<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tbl_user')->insert([
            'username' => 'super_admin',
            'password' => bcrypt('superadmin'),
            'level' => 'admin',
            'foto' => '',
        ]);

    }
}
