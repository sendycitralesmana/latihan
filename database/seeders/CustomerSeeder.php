<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Customer;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Factory::create();
        // for($i=0; $i < 10000; $i++) {
        //     Customer::create([
        //         'name' => $faker->name(),
        //         'gender' => Arr::random(['L', 'P']),
        //         'religion' => Arr::random(['Islam', 'Kristen', 'Buddha', 'Hindu']),
        //         'phone' => mt_rand(080000000000, 089999999999),
        //         'address' => $faker->address(),
        //     ]);
        // }

        $faker = Factory::create();
        for($i=0; $i < 10000; $i++) {
            $data[] = [
                'name' => $faker->name(),
                'gender' => Arr::random(['L', 'P']),
                'religion' => Arr::random(['Islam', 'Kristen', 'Buddha', 'Hindu']),
                'phone' => mt_rand(0000001, 9999999),
                'address' => $faker->address(),
            ];
        }

        foreach (array_chunk($data, 5000) as $item) {
            Customer::insert($item);
        }
    }
    // php artisan db:seed --class=CustomerSeeder
}
