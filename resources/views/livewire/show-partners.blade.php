<div id="parteners" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 mb-5">
        <div class="bg-white">
            <div class="owl-carousel vendor-carousel">
                @foreach($partners as $partner)
                <img src="{{ asset('storage/' .$partner->logo) }}" alt="">
                @endforeach
            </div>
        </div>
    </div>
</div>