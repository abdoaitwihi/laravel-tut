<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class MenuItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 30) as $index) {
            # code...
            DB::table('menu_items')->insert([
                'title' => $faker->sentence(6),
                'price' => $faker->randomDigit,
                'image' => $faker->sentence(2),
                'description' => $faker->paragraph(1),
            ]);
        }
    }
}
