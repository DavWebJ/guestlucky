<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form class="js-validation-signin" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <input type="email" class="form-control" id="email" name="email" :value="old('email')" required autofocus placeholder="Email">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-circle"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Password">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group d-sm-flex justify-content-lg-between align-items-lg-center text-center text-lg-left">
                <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                </div>
            </div>
            <div class="form-group text-center">
                <x-jet-button class="btn btn-hero-primary">
                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Log In
                </x-jet-button>
            </div>
            <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                @if (Route::has('password.request'))
                <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{ route('password.request') }}"> 
                    <i class="fa fa-exclamation-triangle text-muted mr-1"></i> Forgot password
                </a>
                @endif
                <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{ route('register') }}">
                    <i class="fa fa-plus text-muted mr-1"></i> New Account
                </a>
            </p>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
