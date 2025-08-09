<div id="blog" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Nos Activités</h5>
            <h1 class="mb-0">Découvrez les dernières activités de nos organisations partenaires</h1>
        </div>
        <div class="row g-5">
            @foreach($posts as $post)
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="blog-item bg-light rounded overflow-hidden">
                    <div class="blog-img position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset($post->image) }}" alt="">
                        <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">{{ $post->category }}</a>
                    </div>
                    <div class="p-4">
                        <div class="d-flex mb-3">
                            <small class="me-3"><i class="far fa-user text-primary me-2"></i>{{ $post->user->name }}</small>
                            <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ $post->created_at->format('d M, Y') }}</small>
                        </div>
                        <h4 class="mb-3">{{ $post->title }}</h4>
                        <p>{{ Str::limit($post->content, 100) }}</p>
                        <a class="text-uppercase" href="{{ route('blog.detail', $post->id) }}">Lire Plus <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>