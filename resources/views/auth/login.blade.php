<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <!-- <x-authentication-card-logo /> -->
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <div class="input-group">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="input-group">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="remember-me">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="form-actions">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-password">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="login-btn">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<style>
    .login-form {
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
        width: 100%;
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

    .login-btn {
        padding: 10px 20px;
        background-color: #007bff;
        border: none;
        color: #fff;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
    }

    .login-btn:hover {
        background-color: #0056b3;
    }
</style>
