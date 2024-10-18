<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_Upt extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $table = 'list_upts';

    public function User(){
        return $this->hasOne(User::class);
    }

    public function LembagaKonservasi(){
        return $this->hasOne(Lembaga_konservasi::class);
    }

}
