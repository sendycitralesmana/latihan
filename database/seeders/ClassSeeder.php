<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\ClassRoom;
use Carbon\Carbon;

class ClassSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ClassRoom::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name'     => 'A'],
            ['name'     => 'B'],
            ['name'     => 'C'],
        ];

        foreach ($data as $value)
        {
            ClassRoom::insert([
                'name'          => $value['name'],
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]);
        }

        // ClassRoom::insert([
        //     'name'          => 'A',
        //     'created_at'    => Carbon::now(),
        //     'updated_at'    => Carbon::now()
        // ]);
    }
}
