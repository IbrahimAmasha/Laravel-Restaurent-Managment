<x-guest-layout>
    <section id="menu" class="menu py-5">
        <div class="container" data-aos="fade-up">
            <div class="section-header text-center mb-5">
                <p>Check Our <span>Menu Categories</span></p>
            </div>
            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                <div class="tab-pane fade active show" id="menu-starters">
                    <div class="row gy-5">
                        @foreach ($categories as $category)
                            <div class="col-lg-4 col-md-6 menu-item">
                                <div class="card mb-4" data-aos="fade-up" data-aos-delay="100">
                                    <div class="image-container">
                                        <img src="{{ url($category->image) }}" class="card-img-top rounded-image"
                                             alt="{{ $category->name }}">
                                    </div>
                                    <div class="card-body text-center">
                                        <a href="{{ route('categories.show', $category->id) }}" class="text-decoration-none">
                                            <h3 class="title hover:text-green-400">{{ $category->name }}</h3>
                                        </a>
                                        <p class="description text-muted">{{ $category->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
