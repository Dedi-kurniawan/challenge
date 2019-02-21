<?php

use Illuminate\Database\Seeder;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 50; $i++) {
            App\Product::create([
                'nama' => $faker->randomElement(['Jaket Keren', 'Kaos', 'Kemeja', 'Sepatu', 'Topi', 'Tas', 'Gelang', 'Kalung']),
                'supplier_id' => rand(1, 10),
                'harga' => rand(20000, 800000),
                'status' => '1',
                'image' => $faker->randomElement(['green.png', 'black.png', 'yellow.png']),
            ]);
        }
    }
}
