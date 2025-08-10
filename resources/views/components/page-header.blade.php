@props(['title'])

<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">{{ $title }}</h1>
            <a href="/" class="h5 text-white">Accueil</a>
            <i class="far fa-circle text-white px-2"></i>
            <a href="{{ url()->current() }}" class="h5 text-white">{{ $title }}</a>
        </div>
    </div>
</div>
