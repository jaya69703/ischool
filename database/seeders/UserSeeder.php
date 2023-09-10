<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => '1',
            // GENERAL INFO ACCOUNT
            'name' => 'Super Administrator',
            'email' => 'superadmin@example.com',
            'photo' => 'default.png',
            'phone' => '089612345678',
            'password' => Hash::make('20022003'),
            // SPECIAL IDENTITY
            'code' => '000000',
            'isverify' => '1',
            'type' => '1',
        ]);

        DB::table('staff')->insert([
            'id' => '1',
            // IDENTITAS PENGGUNA
            'staff_name' => 'Super Administrator',
            'divisi_id' => '1',
            'position_id' => '1',
            
            // PRIVATE IDENTITY
            'staff_phone' => '089612345678',
            'staff_email' => 'superadmin@example.com',


            // SPECIAL IDENTITY
            'code' => '000000',
        ]);
    }
}
