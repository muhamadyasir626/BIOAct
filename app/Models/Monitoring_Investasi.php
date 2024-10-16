<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring_Investasi extends Model
{
    use HasFactory;
    protected $fillable =[
        'id_lk',
        'jumlah_karyawan_laki',
        'jumlah_karyawan_perempuan',
        'total_karyawan',
        'jumlah_dokter_hewan',
        'jumlah_satwa',
        'jumlah_satwa_terancam_punah',
        'jumlah_lahan_konservasi',
        'jumlah_investasi',
    ];

    public function Lembaga_konservasi(){
        return $this->hasOne(Lembaga_konservasi::class);
    }
}
