<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satwa extends Model
{
    use HasFactory;

    protected $fillable=[

    ];

    public function List_lk(){
        return $this-> hasOne(List_Lk::class);
    }

    public function Tagging(){
        return $this-> hasOne(Tagging::class);
    }
}
