<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama_lengkap' => 'Admin',
            'email' => 'admin@argon.com',
            'jenis_kelamin' => 'Laki-laki',
            'asal_divisi' => 'mining',
            'password' => bcrypt('secret')
        ]);
        DB::table('users')->insert([
            'nama_lengkap' => 'Budi',
            'email' => 'budi@gmail.com',
            'jenis_kelamin' => 'Laki-laki',
            'asal_divisi' => 'mining',
            'password' => bcrypt('secret')
        ]);
    }
}
