<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    // use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'username',
    //     'nip',
    //     'email',
    //     'jenis_kelamin',
    //     'no_telepon',
    //     'kode_pos',
    //     'provinsi',
    //     'kabupaten',
    //     'kecamatan',
    //     'kelurahan',
    //     'alamat_lengkap',
    //     'role',
    //     'id_lk',
    //     'wilayah',
    //     'password',
    // ];

    protected $guarded =['id'];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function Role(){
        return $this->belongsTo(Role::class);
    }
    
    public function ListSpesies(){
        return $this->hasOne(List_Spesies::class);
    }

    public function ListLk(){
        return $this->hasOne(List_Lk::class);
    }

    public function ListUpt(){
        return $this->hasOne(List_Upt::class);
    }

    public function LembagaKonservasi(){
        return $this->hasOne(Lembaga_Konservasi::class);
    }
}
