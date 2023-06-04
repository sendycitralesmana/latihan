<?php

namespace Database\Factories;

use Faker\Factory as faker;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = faker::create();
        return [
            'name' => $faker->name(),
            'nis' => mt_rand(0000001, 9999999),
            'gender' => Arr::random(['L', 'P']),
            'id_class' => Arr::random([1, 2, 3])
        ];
    }
}
