<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('channels')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        \App\Models\Channel::factory(1)->create([
            'name' => 'SMS', 
            'slug' => 'sms'          
        ]);

        \App\Models\Channel::factory(1)->create([
            'name' => 'Email',
            'slug' => 'email'         
        ]);

        \App\Models\Channel::factory(1)->create([
            'name' => 'Push Notification',           
            'slug' => 'push'
        ]);
    }
}
