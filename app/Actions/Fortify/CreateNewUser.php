<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required','boolean'],
            'nip' => ['required', 'string', 'min:18'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_telepon' => ['required', 'string', 'min:12'],
            'kode_pos' => ['required', 'string', 'max:5'],
            'provinsi' => ['required', 'string'],
            'kabupaten' => ['required', 'string'],
            'kecamatan' => ['required', 'string'],
            'kelurahan' => ['required', 'string'],
            'alamat_lengkap' => ['required', 'string'],
            'role' => ['required', 'integer'],
            'id_lk' => ['nullable', 'integer'],
            'area' => ['nullable', 'string'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'username' => $input['username'],
            'jenis_kelamin' => $input['jenis_kelamin'],
            'nip' => $input['nip'],
            'email' => $input['email'],
            'no_telepon' => $input['no_telepon'],
            'kode_pos' => $input['kode_pos'],
            'provinsi' => $input['provinsi'],
            'kabupaten' => $input['kabupaten'],
            'kecamatan' => $input['kecamatan'],
            'kelurahan' => $input['kelurahan'],
            'alamat_lengkap' => $input['alamat_lengkap'],
            'role' => $input['role'],
            'id_lk' => $input['id_lk'] ?? null,
            'area' => $input['id_area'] ?? null,
            'password' => Hash::make($input['password']),
        ]);
    }

}
