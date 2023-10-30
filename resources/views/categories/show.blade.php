<x-guest-layout>
    <section id="menu" class="menu">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                {{-- <p>Check Our <span>Menu</span></p> --}}
            </div>
            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

                <div class="tab-pane fade active show" id="menu-starters">

                    <div class="row gy-5">

                        @foreach ($category->menus as $menu)
                            <div class="col-lg-4 col-md-6  menu-item">
                                <div class="card mb-4" data-aos="fade-up" data-aos-delay="100">
                                    <img src="{{ url('public/menus/' . $menu->image) }}" class="card-img-top rounded"
                                        alt="{{ $menu->name }}">
                                    </a>
                                    <div class="card-body">
                                        <a href="{{ route('categories.show', $menu->id) }}">
                                            <h3 class="title hover:text-green-400">{{ $menu->name }}</h3>
                                        </a>
                                        <p class="ingredients">
                                            {{ $menu->description }}
                                        </p>
                                        <p class="price">
                                            {{ '$' . $menu->price }}
                                        </p>
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
