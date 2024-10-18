<?php

namespace Database\Seeders;

use App\Models\List_Lk;
use App\Models\List_Upt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CSVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // =========================== LIST LK =====================
        $csvFile = base_path('resources\data\list_lk.csv');
        $data = array_map(function ($line) {
            return str_getcsv($line, ','); 
        }, file($csvFile));
    
        array_shift($data); 
    
        // $filteredData = array_filter($data, function ($row) {
        //     return count($row) > 1;
        // });

        // dd($filteredData);
        // dd($data);
    
        foreach ($data as $row) {
            List_Lk::Create([
                'name' => $row[0], 
                'slug' => $row[1], 
            ]);
        }

        // ========================================= LIST UPT =====================
        $csvFile = base_path('resources\data\list_upt.csv');
        $data = array_map(function ($line) {
            return str_getcsv($line, ','); 
        }, file($csvFile));
    
        array_shift($data); 
    
        // $filteredData = array_filter($data, function ($row) {
        //     return count($row) > 1;
        // });

        // dd($filteredData);
        // dd($data);
    
        foreach ($data as $row) {
            List_Upt::Create([
                'bentuk_UPT' => $row[1], 
                'slug_bentuk_upt' => $row[2], 
                'wilayah' => $row[3], 
                'slug_wilayah' => $row[4], 
            ]);
        }
    
    }
    
}
