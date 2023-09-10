<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('positions')->insert([
            'id' => '1',
            // GENERAL INFO ACCOUNT
            'divisi_id' => 1,
            'name' => 'Web Developer',
            'code' => 'WDEV',
            'sallary' => '25000000',
        ]);
    }
}
