<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <!-- <x-authentication-card-logo /> -->
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" class="register-form">
            @csrf

            <div class="input-group">
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="input-group">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
            
            <div class="input-group">
                <x-label for="phone" value="{{ __('Telefone') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autocomplete="username" />
            </div>
            
            <div class="input-group">
                <x-label for="address" value="{{ __('Endereço') }}" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="username" />
            </div>

            <div class="input-group">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="input-group">
                <x-label for="password_confirmation" value="{{ __('Confirmar senha') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4 form-actions">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Já possui conta?') }}
                </a>

                <x-button class="register-btn">
                    {{ __('Registrar') }}
                </x-button>
            </div>
            
            <a href="{{ url('/') }}" class="return-home-btn">
                {{ __('Voltar para a Home') }}
            </a>
        </form>
    </x-authentication-card>
</x-guest-layout>

<style>
    .register-form {
        max-width: 400px;
        margin: 250px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .input-group {
        margin-bottom: 16px;
    }

    .input-group label {
        font-size: 14px;
        color: #333;
        margin-bottom: 8px;
        display: block;
    }

    .input-group input {
        width: 95%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    .remember-me {
        margin-bottom: 16px;
    }

    .forgot-password {
        text-decoration: none;
        font-size: 12px;
        color: #007bff;
    }

    .forgot-password:hover {
        text-decoration: underline;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .register-btn {
        padding: 10px 20px;
        background-color: #007bff;
        border: none;
        color: #fff;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
    }

    .register-btn:hover {
        background-color: #0056b3;
    }

    .return-home-btn {
        color: #007bff;
        font-size: 16px;
        text-decoration: none;
        text-align: center;
        margin-top: 20px;
    }
    
    .return-home-btn:hover {
        text-decoration: underline;
    }
</style>
