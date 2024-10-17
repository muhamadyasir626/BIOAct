<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CSVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = base_path('data/list_lk.csv');
        $data = array_map('str_getcsv',file($csvFile));

        array_shift($data);

        foreach($data as $row){
            Area::Create([
                'name' => $row[1],
                'slug' => $row[2],
            ]);
        }
    }
}
