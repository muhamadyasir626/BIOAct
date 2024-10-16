<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Area::create([
            'name'=> 'Jawa Barat',
            'slug' => 'jawa_barat',
        ]);
        Area::create([
            'name'=> 'Jawa Tenga',
            'slug' => 'jawa_tengah',
        ]);
    }
}
