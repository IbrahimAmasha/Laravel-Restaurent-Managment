<x-guest-layout>
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <div
                    class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                   <h1 class="yummy">Yummy !</h1>
                     <h2 class="enjoy231"> Enjoy Your Healthy Delicious Food </h2>
                    <p data-aos="fade-up" data-aos-delay="100">Explore our vibrant restaurant, where every dish is a culinary delight. Experience flavors that excite and ambiance that invites, promising a memorable dining experience.</p>
                    <a href="{{ route('reservations.step.one') }}" class="btn-book-a-table">Book a Table Now</a> <br> 
                    <a href="{{ route('categories.index') }}" class="btn-book-a-table">Check Our Menu !</a>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">

                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <img src="{{ asset('img/hero-img.png') }}" class="img-fluid" alt="" data-aos="zoom-out"
                        data-aos-delay="300">
                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->

    <section id="menu" class="menu">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <p>Check Our <span>Today's Special</span>, Picked Just For You!</p>
            </div>
            
            <div class="container">
                <div class="row gy-5">
                    @foreach ($specials as $menu)
                        <div class="col-lg-4 col-md-6 menu-item">
                            <div class="card mb-4" data-aos="fade-up" data-aos-delay="100">
                                <div class="image-container">
                                    <img src="{{ url('public/menus/' . $menu->image) }}" class="rounded-image" alt="{{ $menu->name }}">
                                </div>
                                <div class="card-body">
                                    <h4 class="title">{{ $menu->name }}</h4>
                                    <p class="description">{{ $menu->description }}</p>
                                    <p class="price">{{ '$' . $menu->price }}</p>
                                </div>
                            </div>
                        </div><!-- Menu Item -->
                    @endforeach
                </div><!-- End Today's Specials Row -->
            </div><!-- End Today's Specials Container -->
            
        </div>
    </section><!-- End Menu Section -->


    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
        <div class="container" data-aos="zoom-out">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                            class="purecounter">Over 500</span>
                        <p>Dishes Served Daily</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                            class="purecounter">15</span>
                        <p>Years In Business</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                            class="purecounter">4.8</span>
                        <p>Rated stars by Our Customers</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                            class="purecounter">32</span>
                        <p>Chef and Worker</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>
    </section><!-- End Stats Counter Section -->


    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <p>Learn More <span>About Us</span></p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-7 position-relative about-img"
                    style="background-image: url({{ asset('img/about.jpg') }}) ;" data-aos="fade-up"
                    data-aos-delay="150">
                    <div class="call-us position-absolute">
                        <h4>Book a Table</h4>
                        <p>+1 5589 55488 55</p>
                    </div>
                </div>
                <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                    <div class="content ps-0 ps-lg-5">
                        <p class="fst-italic">
                            Welcome to Our Restaurant- a culinary journey like no other. Our story begins with a passion
                            for food and a commitment to delivering an unforgettable dining experience.
                        </p>
                        <p>
                            From our farm-fresh salads to our mouthwatering entrees, every dish is a work of art,
                            meticulously prepared to tantalize your taste buds. Whether you're joining us for a romantic
                            dinner, a casual lunch, or a special celebration, our attentive staff is here to ensure your
                            visit is nothing short of exceptional.
                        </p>
                        <p>
                            Come dine with us and discover why Our Restaurant has become a beloved destination for food
                            enthusiasts and connoisseurs alike. Your culinary adventure awaits!
                        </p>

                        <div class="position-relative mt-4">
                            <img src="{{ asset('img/about-2.jpg') }}" class="img-fluid" alt="">
                            {{-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->



</x-guest-layout>
