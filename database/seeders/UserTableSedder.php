<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        \App\Models\User::factory(1)->create([
            'name' => 'GussWare',
            'email' => 'gussware@gmail.com',
            'email_verified_at' => now(),
            'password' => '123qweAA',
            'remember_token' => Str::random(10),
        ]);
    }
}
