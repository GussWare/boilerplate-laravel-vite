<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSedder;
use Database\Seeders\CategoryTableSeeder;
use Database\Seeders\ChannelTableSeeder;
use Database\Seeders\NotificationTableSeeder;
use Database\Seeders\UserChannelTableSeeder;
use Database\Seeders\SubscriptionsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSedder::class,
            CategoryTableSeeder::class,
            ChannelTableSeeder::class,
            NotificationTableSeeder::class,
            UserChannelTableSeeder::class,
            SubscriptionsTableSeeder::class
        ]);
    }
}