<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satwa extends Model
{
    use HasFactory;

    protected $fillable=[

    ];

    public function Lembaga_Konservasi(){
        return $this-> hasMany(Lembaga_konservasi::class);
    }

    public function Tagging(){
        return $this-> hasMany(Tagging::class);
    }
}
