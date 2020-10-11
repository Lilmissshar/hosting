<div class="sidebar"  data-image="{{ asset('images/sidebar_bg1.jpg') }}">

  <div class="logo">
    <a href="{{ route('dashboard') }}" class="simple-text logo-mini">
      SH
    </a>
    <a href="{{ route('dashboard') }}" class="simple-text logo-normal">
      Capstone 
    </a>
  </div>

  <div class="sidebar-wrapper">
    <div class="user">
      <div class="info">
      <div class="photo">
        <img src="{{ avatar_picture_url(current_user()->avatar) }}" >
      </div>
      <a data-toggle="collapse" href="#collapseExample" class="collapsed">
        <span>{{ str_limit(current_user()->name, 20) }}</span>
      </a>
      </div>
    </div>

    <ul class="nav">
      <li class="nav-item {{ is_active('dashboard') }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="fa fa-pie-chart"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item {{ is_active('plans') }}">
        <a class="nav-link" href="{{ route('admin.plans.index') }}">
          <i class="fa fa-tasks"></i>
          <p>Plans</p>
        </a>
      </li>
      <li class="nav-item {{ is_active('categories') }}">
        <a class="nav-link" href="{{ route('admin.categories.index') }}">
          <i class="fa fa-tag"></i>
          <p>Categories</p>
        </a>
      </li>
      <li class="nav-item {{ is_active('destinations') }}">
        <a class="nav-link" href="{{ route('admin.destinations.index') }}">
          <i class="fa fa-map-marker"></i>
          <p>Destinations</p>
        </a>
      </li>
      <li class="nav-item {{ is_active('keywords') }}">
        <a class="nav-link" href="{{ route('admin.keywords.index') }}">
          <i class="fa fa-key"></i>
          <p>Keywords</p>
        </a>
      </li>
      <li class="nav-item {{ is_active('keywordDestinations') }}">
        <a class="nav-link" href="{{ route('admin.keywordDestinations.index') }}">
          <i class="fa fa-key"></i>
          <p>Keyword Destinations</p>
        </a>
      </li>
      <li class="nav-item {{ is_active('destinationCategories') }}">
        <a class="nav-link" href="{{ route('admin.destinationCategories.index') }}">
          <i class="fa fa-key"></i>
          <p>Destination Categories</p>
        </a>
      </li>
    </ul>
  </div>
</div>
