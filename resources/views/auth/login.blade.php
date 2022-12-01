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
        <div class="bg-dark">
            <div class="row no-gutters justify-content-center bg-dark">
                <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                    <!-- Sign In Block -->
                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
                            <!-- Header -->
                            <div class="mb-2 text-center">
                                <a class="link-fx font-w700 font-size-h1" href="{{route('home')}}">
                                    <span class="text-dark">Guest</span><span class="text-primary">Lucky</span>
                                </a>
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Log In</p>
                            </div>
                            <!-- END Header -->
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
                    </div>
                </div>
            </div>
    <!-- END Sign In Block -->
        </div>
    </div>
    </div>
    <!-- END Page Content -->
    </x-jet-authentication-card>
</x-guest-layout>
