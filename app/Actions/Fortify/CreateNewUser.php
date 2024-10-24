<?php

namespace App\Actions\Fortify;

use App\Models\Role;
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
        // dd($input);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'jenis_kelamin' => ['required','boolean'],
            'nip' => ['required', 'string','min:18', 'max:18','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_telepon' => ['required', 'string', 'min:12','unique:users'],
            'kode_pos' => ['required', 'string','min:5','max:5'],
            'provinsi' => ['required', 'string'],
            'kabupaten' => ['required', 'string'],
            'kecamatan' => ['required', 'string'],
            'kelurahan' => ['required', 'string'],
            'alamat_lengkap' => ['required', 'string'],
            'role' => ['required', 'integer'],
            'id_lk' => ['nullable', 'integer'],
            'area' => ['nullable', 'string'],
            'id_spesies' => ['nullable', 'integer'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $role = Role::find($input['role']); 

        $status_permission = 0; 

        if ($role && $role->tag === 'KKHSG') {
            $status_permission = 1; 
        }

        // dd($status_permission);

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
            'id_spesies' => $input['id_spesies'] ?? null,
            'password' => Hash::make($input['password']),
            'status_permission' => $status_permission,
        ]);
    }

}
