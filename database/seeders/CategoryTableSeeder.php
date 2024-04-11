<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        \App\Models\Category::factory(1)->create([
            'name' => 'Deportes',
        ]);

        \App\Models\Category::factory(1)->create([
            'name' => 'Finanzas',
        ]);

        \App\Models\Category::factory(1)->create([
            'name' => 'Películas',
        ]);
    }
}
