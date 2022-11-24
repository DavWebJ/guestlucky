<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div id="page-container">
            <main id="main-container">
                <div class="bg-dark">
                    <div class="row no-gutters justify-content-center bg-dark">
                        <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">

                            <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                                <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
                                    @if (Route::has('login'))
                                        @auth
                                        <div class="mb-2 text-center">
                                            <a class="link-fx font-w700 font-size-h1" href="{{ route('dashboard') }}">
                                                <span class="text-dark">Guest</span><span class="text-primary">Lucky</span>
                                            </a>
                                        </div>
                                        @else
                                        <div class="mb-2 text-center">
                                            <a class="link-fx font-w700 font-size-h1" href="{{ route('login') }}">
                                                <span class="text-dark">Guest</span><span class="text-primary">Lucky</span>
                                            </a>
                                        </div>
                                        @endauth
                                    @endif
                                    {{ $slot ?? ""}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif