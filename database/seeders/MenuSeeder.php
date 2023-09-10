<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // MENU FRONT-END
        DB::table('menus')->insert([
            'name' => 'Authentication',
            'code' => 'AUTH',
            'icon' => 'fa-solid fa-right-to-bracket',
            'url' => 'login',
            'type' => '0',
            'locate' => '0',
        ]);
        DB::table('menus')->insert([
            'name' => 'Login',
            'code' => 'LOG',
            'icon' => 'fa-solid fa-right-to-bracket',
            'url' => 'login',
            'type' => '1',
            'locate' => '0',
            'parent_id' => '1',
        ]);
        DB::table('menus')->insert([
            'name' => 'Register',
            'code' => 'LOG',
            'icon' => 'fa-solid fa-right-to-bracket',
            'url' => 'register',
            'type' => '1',
            'locate' => '0',
            'parent_id' => '1',
        ]);
    }
}
