<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="container d-flex align-items-center justify-content-between">

        <a href="{{ route('welcome') }}" class="logo d-flex align-items-center me-auto me-lg-0">
            <h1>Yummy<span>.</span></h1>
        </a>

        <nav class="navbar navbar-expand-md ">
            <ul>

                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li><a href="{{ route('categories.index') }}">Menu</a></li>
                <li><a href="{{ route('welcome') }}#about">About</a></li>
                <li><a href="{{ route('welcome') }}#menu">Today's Special</a></li>
                <li><a href="{{ route('welcome') }}#footer">Contact</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Signup</a>
                    @endguest
                </li>
                @auth
                    <li class='dropdown'>
                        <a class="dropdown-toggle" data-toggle="dropdown" href='#'>Profile</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('reservations') }}">Reservations</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                @endauth
            </ul>



        </nav><!-- .navbar -->

        <a class="btn-book-a-table" href="{{ route('reservations.step.one') }}">Book a Table</a>
        <a class="btn-book-a-table" href="{{ route('categories.index') }}">Order Now</a>

    </div>
</header>
<!-- End Header -->
