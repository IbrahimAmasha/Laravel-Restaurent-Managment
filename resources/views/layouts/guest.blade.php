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

 </head>

 <body class="font-sans antialiased">
     <header id="header" class="header fixed-top d-flex align-items-center">

         <div class="container d-flex align-items-center justify-content-between">

             <a href="{{ route('welcome') }}" class="logo d-flex align-items-center me-auto me-lg-0">
                 <h1>Yummy<span>.</span></h1>
             </a>

             <nav id="navbar" class="navbar">
                 <ul>
                     <li><a href="{{ route('welcome') }}">Home</a></li>
                     <li><a href="{{ route('welcome') }}#about">About</a></li>
                     <li><a href="{{ route('categories.index') }}">Categories</a></li>
                     <li><a href="{{ route('welcome') }}#menu">Menu</a></li>
                     <li><a href="{{ route('reservations.step.one') }}">Book A Table</a></li>

                     <li><a href="{{ route('welcome') }}#footer">Contact</a></li>
                 </ul>
             </nav><!-- .navbar -->

             <a class="btn-book-a-table" href="{{ route('reservations.step.one') }}">Book a Table</a>
             <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
             <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

         </div>
     </header>
     <!-- End Header -->

     <div class="font-sans text-gray-900 antialiased min-h-screen min-vh-100 ">
         {{ $slot }}
     </div>

     <!-- ======= Footer ======= -->
     <footer id="footer" class="footer">

         <div class="container">
             <div class="row gy-3">
                 <div class="col-lg-3 col-md-6 d-flex">
                     <i class="bi bi-geo-alt icon"></i>
                     <div>
                         <h4>Address</h4>
                         <p>
                             A108 Adam Street <br>
                             New York, NY 535022 - US<br>
                         </p>
                     </div>

                 </div>

                 <div class="col-lg-3 col-md-6 footer-links d-flex">
                     <i class="bi bi-telephone icon"></i>
                     <div>
                         <h4>Reservations</h4>
                         <p>
                             <strong>Phone:</strong> +1 5589 55488 55<br>
                             <strong>Email:</strong> info@example.com<br>
                         </p>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6 footer-links d-flex">
                     <i class="bi bi-clock icon"></i>
                     <div>
                         <h4>Opening Hours</h4>
                         <p>
                             <strong>Mon-Sat: 11AM</strong> - 23PM<br>
                             Sunday: Closed
                         </p>
                     </div>
                 </div>
             </div>
         </div>

         <div class="container">
             <div class="copyright">
                 &copy; Copyright <strong><span>Yummy</span></strong>. All Rights Reserved
             </div>
             <div class="credits">
                 <!-- All the links in the footer should remain intact. -->
                 <!-- You can delete the links only if you purchased the pro version. -->
                 <!-- Licensing information: https://bootstrapmade.com/license/ -->
                 <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
                 Developed by Ibrahim Amasha
             </div>
         </div>

     </footer><!-- End Footer -->
     <!-- End Footer -->
     <script src="{{ asset('js/main.js') }}"></script>
     <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

 </body>

 </html>
