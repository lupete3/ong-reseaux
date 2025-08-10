<div id="features" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Nos Objectifs</h5>
            <h1 class="mb-0">Nous sommes là pour accompagner la croissance de votre impact</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="row g-5">
                    @foreach($features->slice(0, 2) as $feature)
                    <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa {{ $feature->icon }} text-white"></i>
                        </div>
                        <h4>{{ $feature->title }}</h4>
                        <p class="mb-0">{{ $feature->description }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="{{ asset('storage/' . ($settings['feature_image']->value ?? 'template/img/feature.jpg')) }}" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row g-5">
                    @foreach($features->slice(2, 2) as $feature)
                    <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa {{ $feature->icon }} text-white"></i>
                        </div>
                        <h4>{{ $feature->title }}</h4>
                        <p class="mb-0">{{ $feature->description }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>