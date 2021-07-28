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
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
//        dd($input);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'creer_utilisateurs' => ['required', 'string'],

            'evenement' => ['required', 'string'],
            'publicite' => ['required', 'string'],
            'articles' => ['required', 'string'],

            'ajouter' => ['required', 'string'],
            'modifier' => ['required', 'string'],
            'effacer' => ['required', 'string'],


            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],

            'creer_utilisateurs' => $input['creer_utilisateurs'],

            'evenement' => $input['evenement'],
            'publicite' => $input['publicite'],
            'articles' => $input['articles'],

            'ajouter' => $input['ajouter'],
            'modifier' => $input['modifier'],
            'effacer' => $input['effacer'],

            'password' => Hash::make($input['password']),
        ]);
    }
}
