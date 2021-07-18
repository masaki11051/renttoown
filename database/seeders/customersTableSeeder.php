<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class customersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_EN');
        $sampledata = [];
        for($i = 0; $i < 300; $i++) {
            $id = $i + 1;
            $row = [
                    'id' => $id,
                    'name' => $faker->name,
                    'age' => $faker->numberBetween(21,60),
                    'phone_number' => $faker->regexify('0\d{10}'),
                    'city' => $faker->city(),
                    'mail' => $faker->email('[a-zA-Z0-9-_\.]+@[a-zA-Z0-9-_\.]+'),
                ];
            DB::table('customers')->insert($row);
        }

        //
        //
    }
}
