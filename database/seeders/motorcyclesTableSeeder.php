<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class motorcyclesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('en_EN');
        $sampledata = [];
        for ($i = 0; $i < 300; $i++) {
            $motorcycleid = $i + 1;
            $motorcycle = [
                'id' => $motorcycleid,
                'brand' => $faker->brand,
                'motorcycle_type' => $faker->motorcycle_type,
                'price' => $faker->regexify('d{6}'),
                'motorcycle_certificate' => $faker->motorcycle_certificate,
                'motorcycle_registration_number' => $faker->motorcycle_registration_number,
            ];
            DB::table('motorcycles')->insert($motorcycle);
        }

        //
        //
    }
}
