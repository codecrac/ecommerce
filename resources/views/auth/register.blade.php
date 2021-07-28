{{--
@extends('admin.includes2')

@section('style_complementaire')
    <style>
        a{
            text-decoration: none;
            color: #fff;
        }
    </style>
@endsection

@section('body')--}}

    <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
{{--            <x-jet-authentication-card-logo />--}}
            <h2 class="text-center" style="font-size: 24px"> Ajouter un administrateur </h2>
            <h2 class="text-center"> <a class="btn btn-primary" href="{{route('dashboard')}}"> Retour au tableau de bord </a> </h2>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nom') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Mot de passe') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmer Mot de passe') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>


            <div class="row">
                <table style="width: 100%;margin: 8px">
                    <tbody>
                    <tr>
                        <td>Peut acceder a la section :</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Page [ gestion d'articles ]</b> ? </td>
                        <td>
                            <select class="shadow-none pr-7 border-0 form-control-line searchable-select"
                                    required name="articles">
                                <option value="true">Oui</option>
                                <option value="false">Non</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td> <b>Publicite</b> ? </td>
                        <td>
                            <select class="shadow-none pr-7 border-0 form-control-line searchable-select"
                                    required name="publicite">
                                <option value="true">Oui</option>
                                <option value="false">Non</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td> <b>Evenement</b> ? </td>
                        <td>
                            <select class="shadow-none pr-7 border-0 form-control-line searchable-select"
                                    required name="evenement">
                                <option value="true">Oui</option>
                                <option value="false">Non</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td> <b>Utilisateurs</b> </td>
                        <td>
                            <select class="shadow-none pr-7 border-0 form-control-line searchable-select"
                                    required name="creer_utilisateurs">
                                <option value="true">Oui</option>
                                <option value="false">Non</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td> Peut <b>Ajouter</b> des elements </td>
                        <td>
                            <select class="shadow-none pr-7 border-0 form-control-line searchable-select"
                                    required name="ajouter">
                                <option value="true">Oui</option>
                                <option value="false">Non</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td> Peut <b>Modifier</b> des elements ? </td>
                        <td>
                            <select class="shadow-none pr-7 border-0 form-control-line searchable-select"
                                    required name="modifier">
                                <option value="true">Oui</option>
                                <option value="false">Non</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td> Peut <b>Supprimer</b> des elements ? </td>
                        <td>
                            <select class="shadow-none pr-7 border-0 form-control-line searchable-select"
                                    required name="effacer">
                                <option value="true">Oui</option>
                                <option value="false">Non</option>
                            </select>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
{{--
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif--}}

            <div class="flex items-center justify-end mt-4">
                {{--<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>--}}

                <x-jet-button class="ml-4">
                    {{ __('Enregistrer') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

{{--@endsection--}}
