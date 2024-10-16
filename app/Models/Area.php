<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function User(){
        return $this->hasOne(User::class);
    }

    public function LembagaKonservasi(){
        return $this->hasOne(Lembaga_konservasi::class);
    }

}
