@extends('layouts.client.master') 

@section('content')
Gallery
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Header Section -->
  <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 col-md-3 order-2 order-sm-1">
                    <div class="header__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-sm-4 col-md-6 order-1  order-md-2 text-center">
                    <a href="{{ route('home') }}" class="site-logo">
                        <img src="img/logo2.png" alt="">
                    </a>
                </div>
                @if(!current_user())
                <div class="col-sm-4 col-md-3 order-1 order-sm-3">
                    <div class="header__switches">
                        <a href="#" class="search-switch"><i class="fa fa-search"></i></a>
                        <a href="#" class="nav-switch"><i class="fa fa-bars"></i></a>
                        <a href="{{ route('client.login.show') }}"><i class="fa fa-user-circle fa-7x"></i></a>
                    </div>
                </div>
                @elseif (current_user()->id == '1')
                <div class="col-sm-4 col-md-3 order-1 order-sm-3">
                    <div class="header__switches">
                        <a href="#" class="search-switch"><i class="fa fa-search"></i></a>
                        <a href="#" class="nav-switch"><i class="fa fa-bars"></i></a>
                        <a href="{{ route('client.login.show') }}"><i class="fa fa-user-circle fa-7x"></i></a>
                    </div>
                </div>
                @else
                <div class="col-sm-4 col-md-3 order-1 order-sm-3">
                    <div class="header__switches">
                        <a class="nav-link" href="{{route('client.account.show')}}">
                          <i class="fa fa-cog"></i> Settings
                        </a>
                        <a href="{{ route('client.logout') }}" class="nav-link" style="color:red;">
                          <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </div>
                </div>
                @endif
            </div>
            <nav class="main__menu">
                <ul class="nav__menu">
                    <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li><a class="nav-link" href="{{ route('datepicker') }}">Recommendation</a></li>
                   <li><a class="menu--active" href="{{ route('gallery') }}">Gallery</a></li>
                    {{--<li><a href="./blog.html">Blog</a>
                        <ul class="sub__menu">
                            <li><a href="./blog-single.html">Blog Single</a></li>
                        </ul>
                    </li>
                    <li><a href="./contact.html">Contact</a></li>--}}
                </ul>
            </nav>
        </div>
    </header>
  <!-- Header Section end -->
<body>
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Pick a state
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route('galleryPenang' )}}">Penang</a>
    <a class="dropdown-item" href="#">Perak</a>
    <a class="dropdown-item" href="#">Perlis</a>
    <a class="dropdown-item" href="#">Kedah</a>
    <a class="dropdown-item" href="#">Johor</a>
    <a class="dropdown-item" href="#">Melaka</a>
    <a class="dropdown-item" href="{{ route('gallerySelangor') }}">Selangor</a>
    <a class="dropdown-item" href="#">Kuala Lumpur</a>
    <a class="dropdown-item" href="#">Sabah</a>
    <a class="dropdown-item" href="#">Sarawak</a>
    <a class="dropdown-item" href="#">Pahang</a>
    <a class="dropdown-item" href="#">Terengganu</a>
    <a class="dropdown-item" href="#">Kelantan</a>
  </div><br><br>
</div>

<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Activity Type
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route('galleryPenangSightSeeing') }}">Sight Seeing</a>
    <a class="dropdown-item" href="#">Relaxation</a>
    <a class="dropdown-item" href="#">Cultural</a>
    <a class="dropdown-item" href="#">Adventurous</a>
  </div><br>
</div>


</body>

{{--<gallery-component prop-destinations="{{ $destinations }}"></gallery-component>--}}

<!-- About Page -->
<div class="gallery__page">
    <div class="gallery__warp">
      <div class="row">
        @foreach($destinations as $destination)
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a class="gallery__item fresco" href="{{ asset('images/destinations/' . $destination->picture) }}" data-fresco-group="gallery">
            <img src="{{ asset('images/destinations/' . $destination->picture) }}" alt="image" width="500" height="375">
            Name: {{ $destination->name }}<br>
            Description: {{ $destination->description}}
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- About Page end -->
</body>
@endsection('content')


