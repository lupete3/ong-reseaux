<div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($sliders as $slider)
        <div class="carousel-item @if($loop->first) active @endif">
            <img class="w-100" src="{{ asset('storage/' . $slider->image) }}" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 900px;">
                    <h5 class="text-white text-uppercase mb-3 animated slideInDown">{{ $slider->subtitle }}</h5>
                    <h1 class="display-1 text-white mb-md-4 animated zoomIn">{{ $slider->title }}</h1>
                    <a href="{{ $slider->button1_url }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">{{ $slider->button1_text }}</a>
                    <a href="{{ $slider->button2_url }}" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">{{ $slider->button2_text }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
    </button>
</div>