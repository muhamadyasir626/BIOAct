<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_Lk extends Model
{
    use HasFactory;

    protected $guarded =[
        'id',
    ];

     protected $table = 'list_lks';

    public function User(){
        return $this->hasOne(User::class);
    }

    public function LembagaKonservasi(){
        return $this->hasOne(Lembaga_Konservasi::class);
    }

    public function MonitoringInventaris(){
        return $this->hasOne(Monitoring_Investasi::class);
    }

    public function Satwa(){
        return $this->hasOne(Satwa::class);
    }
}
