<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Guest Lucky</title>
    <!-- Font Awesome Icons -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css'/>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" />
    <!-- Google Font: Source Sans Pro -->
    @yield('css_before')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ mix('css/dashmix.css') }}">
    @livewireStyles
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
            <!-- Scripts -->

</head>
    </head>
    <body>
    <!-- Page Container -->
      <div id="page-container">
          <!-- Main Container -->
          <main id="main-container">
           {{ $slot ?? '' }}
        </main>
            <!-- END Main Container -->
      </div>
        <!-- END Page Container -->

        @stack('modals')
        <!-- Dashmix Core JS -->
         <script src="{{ asset('admin/js/js.cookie.min.js') }}"></script> 
        <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script> 
        <script src="{{ asset('js/dashmix.app.js') }}"></script>
        <script src="{{ asset('js/laravel.app.js') }}"></script> 

        @livewireScripts
    </body>
</html>
