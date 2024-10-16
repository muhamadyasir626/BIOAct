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
            'username' => ['required','string','max:255'],
            'nip' =>['required','string','min:18'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_telp' =>['required','string','min:12','max:13'],
            'kode_pos' =>['required','string','max:5'],
            'provinsi'=>['required','string'],
            'kabupaten'=>['required','string'],
            'kecamatan'=>['required','string'],
            'kelurahan'=>['required','string'],
            'role'=>['required','integer'],
            'id_lk'=>['integer'],
            'id_area'=>['integer'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
