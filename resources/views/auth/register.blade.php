<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
                <div class="bg-dark">
            <div class="row no-gutters justify-content-center bg-dark">
                <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                    <!-- Sign In Block -->
                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
                            <!-- Header -->
                            <div class="mb-2 text-center">
                                <a class="link-fx font-w700 font-size-h1" href="index.html">
                                    <span class="text-dark">Guest</span><span class="text-primary">Lucky</span>
                                </a>
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Log In</p>
                            </div>
                            <!-- END Header -->
        <form class="js-validation-signin" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="name" name="name" :value="old('name')" required autofocus placeholder="Your name">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-circle"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="email" class="form-control" id="email" name="email" :value="old('email')" required autofocus placeholder="Email">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Password">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="example-select">Account type *</label>
                <select class="form-control" id="role_id" name="role_id">
                    <option value="" selected="selected" style="display:none ;">Please select your account type</option>
                    <option value="2">Staf</option>
                    <option value="3">Customer</option>
                </select>
            </div>
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
            @endif

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <div class="form-group text-center">
                    <x-jet-button class="btn btn-square btn-hero-secondary">
                        <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Register
                    </x-jet-button>
                </div>
            </div>
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
