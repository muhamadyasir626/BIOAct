<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembaga_Konservasi extends Model
{
    use HasFactory;

    protected $fillable =[

    ];

    public function User(){
        return $this->hasOne(User::class);
    }

    public function Area(){
        return $this->hasOne(Area::class);
    }

    public function Satwa(){
        return $this->hasOne(Satwa::class);
    }

    public function Monitoring_investasi(){
        return $this->hasOne(Monitoring_investasi::class);
    }
}
