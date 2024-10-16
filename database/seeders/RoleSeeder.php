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
            'name'=> 'Komisi Keamanan Hayati (KKH)',
            'slug' => 'komisi_keamanan_hayati',
        ]);

        Role::create([
            'name'=> 'Lembaga Konservasi (LK)',
            'slug' => 'lembaga_konservasi',
        ]);

        Role::create([
            'name'=> 'Unit Pelaksana Teknis (UPT)',
            'slug' => 'unit_pelaksana_teknis',
        ]);

        Role::create([
            'name'=> 'Dokter Hewan',
            'slug' => 'dokter_hewan',
        ]);

        Role::create([
            'name'=> 'Keeper',
            'slug' => 'keeper',
        ]);

        Role::create([
            'name'=> 'Staff Keeper',
            'slug' => 'staff_keeper',
        ]);

    }
}
