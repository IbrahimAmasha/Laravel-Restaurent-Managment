<x-guest-layout>
    <section id="menu" class="menu py-5">
        <div class="container" data-aos="fade-up">
            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                <div class="tab-pane fade active show" id="menu-starters">
                    <div class="row gy-5">
                        @foreach ($category->menus as $menu)
                            <div class="col-lg-4 col-md-6 menu-item">
                                <div class="card mb-4 same-size-card" data-aos="fade-up" data-aos-delay="100">
                                    <div class="image-container">
                                        <img src="{{ url('public/menus/' . $menu->image) }}" class="card-img-top rounded-image"
                                             alt="{{ $menu->name }}">
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-between text-center">
                                        <a href="{{ route('categories.show', $menu->id) }}" class="text-decoration-none">
                                            <h3 class="title hover:text-green-400">{{ $menu->name }}</h3>
                                        </a>
                                        <p class="ingredients text-muted">{{ $menu->description }}</p>
                                        <div>
                                            <p class="price">{{ '$' . $menu->price }}</p>
                                            <form action="{{route('cart.addToCart' , ['id' => $menu->id])}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary add-to-order-btn">Add To Order</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!-- End Starter Menu Content -->
            </div>
        </div>
        
        
    </section><!-- End Menu Section -->

 
</x-guest-layout>
