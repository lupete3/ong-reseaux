<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
        <a href="{{ url('/') }}" class="navbar-brand p-0">
            @if(isset($settings['logo']) && $settings['logo']->value)
                <img src="{{ asset('storage/' . $settings['logo']->value) }}" alt="{{ $settings['site_name']->value ?? 'Logo' }}" style="max-height: 50px;">
            @else
                <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>{{ $settings['site_name']->value ?? 'Startup' }}</h1>
            @endif
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ url('/') }}" class="nav-item nav-link">Accueil</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Qui sommes-nous ?</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('about') }}" class="dropdown-item">A propos de nous</a>
                        <a href="{{ route('team') }}" class="dropdown-item">Les Membres</a>
                        <a href="{{ route('features') }}" class="dropdown-item">Nos Objectifs</a>
                    </div>
                </div>
                <a href="{{ route('achievements') }}" class="nav-item nav-link">Nos réalisations</a>
                <a href="{{ route('blog') }}" class="nav-item nav-link">Nos Activités</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
            </div>
            @if (Route::has('login'))
                <div class="navbar-nav">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary py-2 px-4 ms-3">Tableau de bord</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4 ms-3">Connexion</a>
                    @endauth
                </div>
            @endif
        </div>
    </nav>
</div>