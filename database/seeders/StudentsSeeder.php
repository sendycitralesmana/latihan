<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Students;
use Carbon\Carbon;

class StudentsSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Students::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'Sena', 'nis' => '01', 'gender' => 'L', 'id_class' => '1', ],
            ['name' => 'Yana', 'nis' => '02', 'gender' => 'L', 'id_class' => '2', ],
            ['name' => 'Yoga', 'nis' => '03', 'gender' => 'L', 'id_class' => '3', ]
        ];

        foreach ($data as $value)
        {
            Students::insert([
                'name' => $value['name'],
                'nis' => $value['nis'],
                'gender' => $value['gender'],
                'id_class' => $value['id_class'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
