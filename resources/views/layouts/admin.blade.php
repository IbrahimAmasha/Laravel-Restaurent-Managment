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
</head>

<body class="font-sans antialiased">
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
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    </head>

    <body class="font-sans antialiased">

        <div class="wrapper sidebar">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header flex justify-center">
                    <h3>Admin Panel</h3>
                </div>

                <ul class="list-unstyled components">
                    <p> Heading</p>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Home</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                            <li>
                                <a href="#">Home 2</a>
                            </li>
                            <li>
                                <a href="#">Home 3</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.menus.index') }}">Menu</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}">Categories</a>

                    </li>
                    <li>
                        <a href="{{ route('admin.reservations.index') }}">Reservations</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.tables.index') }}">Tables</a>
                    </li>
                </ul>

                <ul class="list-unstyled CTAs">
                    <li>
                    </li>
                    <li>
                    </li>
                </ul>
            </nav>
            <main class="m2 p-8 w-100">
                <div>
                    @if (session()->has('danger'))
                        <div class="alert alert-danger m-4 " role="alert">
                            {{ session()->get('danger') }}
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success m-4 " role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if (session()->has('warning'))
                        <div class="alert alert-warning m-4 " role="alert">
                            {{ session()->get('warning') }}
                        </div>
                    @endif
                </div>
                {{ $slot }}
            </main>
        </div>

    </body>

    </html>

    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>
