<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class List_Spesies extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function User(){
        return $this->HasOne(User::class);
    }
}
