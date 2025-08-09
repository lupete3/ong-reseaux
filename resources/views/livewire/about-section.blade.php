<div id="about" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title position-relative pb-3 mb-5">
                    <h5 class="fw-bold text-primary text-uppercase">{{ $about->subtitle }}</h5>
                    <h1 class="mb-0">{{ $about->title }}</h1>
                </div>
                <p class="mb-4">{{ $about->content }}</p>
                <div class="row g-0 mb-3">
                    @php $features = json_decode($about->features); @endphp
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>{{ $features[0] }}</h5>
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>{{ $features[1] }}</h5>
                    </div>
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>{{ $features[2] }}</h5>
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>{{ $features[3] }}</h5>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Contactez-nous pour toute question</h5>
                        <h4 class="text-primary mb-0">{{ config('variables.phone') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" style="min-height: 500px;">
                <div class="position-relative h-100">
                    {{-- <iframe class="position-absolute w-100 h-100 rounded"
                            src="{{ $about->video_url }}"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen>
                    </iframe> --}}
                    {!! $about->video_url !!}
                </div>
            </div>
        </div>
    </div>
</div>