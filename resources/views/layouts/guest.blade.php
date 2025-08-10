<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Plateforme Partenaire - Connecter les ONG en Afrique')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Plateforme, ONG, Afrique, Réseau, Partenaires" name="keywords">
    <meta content="Une plateforme pour connecter les organisations et réseaux en Afrique, leur permettant de publier leurs activités et de collaborer." name="description">

    <!-- Favicon -->
    <link href="{{ asset('template/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    @if(isset($settings['address']))
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>{{ $settings['address']->value }}</small>
                    @endif
                    @if(isset($settings['phone']))
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>{{ $settings['phone']->value }}</small>
                    @endif
                    @if(isset($settings['email']))
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>{{ $settings['email']->value }}</small>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    @if(isset($settings['twitter_url']))
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="{{ $settings['twitter_url']->value }}"><i class="fab fa-twitter fw-normal"></i></a>
                    @endif
                    @if(isset($settings['facebook_url']))
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="{{ $settings['facebook_url']->value }}"><i class="fab fa-facebook-f fw-normal"></i></a>
                    @endif
                    @if(isset($settings['linkedin_url']))
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="{{ $settings['linkedin_url']->value }}"><i class="fab fa-linkedin-in fw-normal"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <livewire:navigation-menu :settings="$settings" />

    <main>
        {{ $slot }}
    </main>

    <livewire:footer-section :settings="$settings" />

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('template/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('template/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('template/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('template/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('template/js/main.js') }}"></script>
</body>

</html>
