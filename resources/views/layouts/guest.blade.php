 <!DOCTYPE html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'Laravel') }}</title>

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

     <!-- Scripts -->

     @vite(['resources/css/app.css', 'resources/js/app.js'])
     <link rel="stylesheet" href="{{ asset('css/main.css') }}">

     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/main.css') }}">
     <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
     {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}

 </head>

 <body class="font-sans antialiased">

    @include('../partials/navbar')

     <div class="font-sans text-gray-900 antialiased min-h-screen min-vh-100 ">
         {{ $slot }}
     </div>

     @include('../partials/footer')

     <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
     <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
     <script src="{{ asset('js/main.js') }}"></script>
     {{-- <script src="{{ asset('js/popper.min.js') }}"></script> --}}
     <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
     
     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 </body>

 </html>
