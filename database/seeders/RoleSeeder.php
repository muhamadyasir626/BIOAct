<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name'=> 'Konservasi Keanekaragaman Hayati Spesies dan Genetik',
            'slug' => 'konservasi_keanekaragaman_hayati_spesies_dan_genetik',
            'tag' => 'KKHSG',
        ]);

        Role::create([
            'name'=> 'Lembaga Konservasi',
            'slug' => 'lembaga_konservasi',
            'tag' => 'LK',
        ]);

        Role::create([
            'name'=> 'Unit Pelaksana Teknis',
            'slug' => 'unit_pelaksana_teknis',
            'tag' => 'UPT',

        ]);

        Role::create([
            'name'=> 'Dokter Hewan',
            'slug' => 'dokter_hewan',
            'tag' => 'DRH',

        ]);

        Role::create([
            'name'=> 'Studbook Keeper',
            'slug' => 'studbook_keeper',
            'tag' => 'SBK',

        ]);

        Role::create([
            'name'=> 'Staff Keeper',
            'slug' => 'staff_keeper',
            'tag' => 'SK',

        ]);

    }
}
