<x-guest-layout>
    <section id="menu" class="menu">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <p>Check Our <span>Categories</span></p>
            </div>
            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

                <div class="tab-pane fade active show" id="menu-starters">

                    <div class="row gy-5">

                        @foreach ($categories as $category)
                            <div class="col-lg-4 col-md-6  menu-item">
                                <div class="card mb-4" data-aos="fade-up" data-aos-delay="100">
                                    <img src="{{ url($category->image) }}" class="card-img-top rounded"
                                        alt="{{ $category->name }}">
                                    </a>
                                    <div class="card-body">
                                        <a href="{{ route('categories.show', $category->id) }}">
                                            <h3 class="title hover:text-green-400">{{ $category->name }}</h3>
                                        </a>
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
