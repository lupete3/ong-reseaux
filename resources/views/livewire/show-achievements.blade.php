<div id="achievements" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Nos Réalisations</h5>
            <h1 class="mb-0">Quelques exemples concrets de l'impact de nos partenaires</h1>
        </div>
        <div class="row g-5">
            @forelse($achievements as $achievement)
            <div class="col-lg-4 wow slideInUp" data-wow-delay="{{ $loop->iteration * 0.3 }}s">
                <div class="blog-item bg-light rounded overflow-hidden">
                    <div class="blog-img position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('storage/' .$achievement->image) }}" alt="Image de la réalisation : {{ $achievement->title }}">
                        <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="#">{{ $achievement->location }}</a>
                    </div>
                    <div class="p-4">
                        <div class="d-flex mb-3">
                            <small class="me-3"><i class="far fa-user text-primary me-2"></i>{{ $achievement->partner->name }}</small>
                            <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ \Carbon\Carbon::parse($achievement->date)->format('d M, Y') }}</small>
                        </div>
                        <h4 class="mb-3">{{ $achievement->title }}</h4>
                        <p>{{ Str::limit($achievement->description, 100) }}</p>
                        <a class="text-uppercase" href="{{ route('achievement.detail', $achievement->id) }}">Lire Plus <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>Aucune réalisation à afficher pour le moment.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>