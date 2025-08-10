<!-- Menu -->
<aside id="fbs__net-navbars" class="layout-menu menu-vertical menu bg-menu-theme offcanvas-xl offcanvas-start">
  <div class="app-brand demo">
    <a href="{{ url('/') }}" class="app-brand-link"><x-app-logo /></a>
    <button type="button" class="btn-close text-reset d-xl-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
      <a class="menu-link" href="{{ route('dashboard') }}" wire:navigate>{{ __('Tableau de bord') }}</a>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
        <a class="menu-link" href="{{ route('admin.posts.index') }}" wire:navigate>
            <i class="menu-icon tf-icons bx bx-news"></i>
            <div class="text-truncate">Activités</div>
        </a>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.team-members.*') ? 'active' : '' }}">
        <a class="menu-link" href="{{ route('admin.team-members.index') }}" wire:navigate>
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div class="text-truncate">Membres</div>
        </a>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.achievements.*') ? 'active' : '' }}">
        <a class="menu-link" href="{{ route('admin.achievements.index') }}" wire:navigate>
            <i class="menu-icon tf-icons bx bx-trophy"></i>
            <div class="text-truncate">Réalisations</div>
        </a>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
        <a class="menu-link" href="{{ route('admin.sliders.index') }}" wire:navigate>
            <i class="menu-icon tf-icons bx bx-images"></i>
            <div class="text-truncate">Sliders</div>
        </a>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
        <a class="menu-link" href="{{ route('admin.partners.index') }}" wire:navigate>
            <i class="menu-icon tf-icons bx bx-buildings"></i>
            <div class="text-truncate">Partenaires</div>
        </a>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.features.*') ? 'active' : '' }}">
        <a class="menu-link" href="{{ route('admin.features.index') }}" wire:navigate>
            <i class="menu-icon tf-icons bx bx-star"></i>
            <div class="text-truncate">Objectifs</div>
        </a>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
        <a class="menu-link" href="{{ route('admin.testimonials.index') }}" wire:navigate>
            <i class="menu-icon tf-icons bx bx-comment-dots"></i>
            <div class="text-truncate">Témoignages</div>
        </a>
    </li>

    <!-- Pages Management -->
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Pages</span>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.about.edit') ? 'active' : '' }}">
        <a class="menu-link" href="{{ route('admin.about.edit') }}" wire:navigate>
            <i class="menu-icon tf-icons bx bx-info-circle"></i>
            <div class="text-truncate">À Propos</div>
        </a>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
        <a class="menu-link" href="{{ route('admin.settings') }}" wire:navigate>
            <i class="menu-icon tf-icons bx bx-cog"></i>
            <div class="text-truncate">Paramètres du site</div>
        </a>
    </li>


    <!-- Settings -->
    <li class="menu-item {{ request()->is('settings/*') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div class="text-truncate">{{ __('Paramètres') }}</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ request()->routeIs('settings.profile') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('settings.profile') }}" wire:navigate>{{ __('Profil') }}</a>
        </li>
        <li class="menu-item {{ request()->routeIs('settings.password') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('settings.password') }}" wire:navigate>{{ __('Mot de passe') }}</a>
        </li>
      </ul>
    </li>
  </ul>
</aside>
<!-- / Menu -->

<script>
  // Toggle the 'open' class when the menu-toggle is clicked
  document.querySelectorAll('.menu-toggle').forEach(function(menuToggle) {
    menuToggle.addEventListener('click', function() {
      const menuItem = menuToggle.closest('.menu-item');
      // Toggle the 'open' class on the clicked menu-item
      menuItem.classList.toggle('open');
    });
  });
</script>
