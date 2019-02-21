<?php

use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            App\Supplier::create([
                'nama' => $faker->name,
                'email' => $faker->unique()->email,
                'kota' => $faker->city,
                'tahun_kelahiran' => rand(1983, 2008),
            ]);
        }
    }
}
