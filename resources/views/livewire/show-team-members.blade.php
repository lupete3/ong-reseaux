<div id="team" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Représentants</h5>
            <h1 class="mb-0">Les visages de nos organisations partenaires</h1>
        </div>
        <div class="row g-5">
            @foreach($teamMembers as $member)
            <div class="col-lg-3 wow slideInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('storage/' .$member->photo) }}" alt="">
                        <div class="team-social">
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href="{{ $member->twitter_url }}"><i class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href="{{ $member->facebook_url }}"><i class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href="{{ $member->linkedin_url }}"><i class="fab fa-linkedin-in fw-normal"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <h4 class="text-primary">{{ $member->name }}</h4>
                        <p class="text-uppercase m-0">{{ $member->position }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>