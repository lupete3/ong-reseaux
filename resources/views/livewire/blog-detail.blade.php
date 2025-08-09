@section('title', $post->title)

<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="mb-5">
                    <img class="img-fluid w-100 rounded mb-5" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                    <h1 class="mb-4">{{ $post->title }}</h1>
                    <div class="d-flex mb-3">
                        <small class="me-3"><i class="far fa-user text-primary me-2"></i>{{ $post->user->name }}</small>
                        <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ $post->created_at->format('d M, Y') }}</small>
                    </div>
                    <p>{!! nl2br(e($post->content)) !!}</p>
                </div>
                <!-- Blog Detail End -->
            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4">
                <!-- Recent Post Start -->
                <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="mb-0">Autres Articles</h3>
                    </div>
                    @foreach(\App\Models\Post::where('id', '!=', $post->id)->latest()->take(5)->get() as $recentPost)
                    <div class="d-flex rounded overflow-hidden mb-3">
                        <img class="img-fluid" src="{{ asset($recentPost->image) }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                        <a href="{{ route('blog.detail', $recentPost->id) }}" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">{{ $recentPost->title }}
                        </a>
                    </div>
                    @endforeach
                </div>
                <!-- Recent Post End -->
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
</div>