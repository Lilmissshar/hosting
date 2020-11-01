@extends('layouts.client.master')

@section('content')
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
                        <a href="{{ route('plans.index') }}"><i class="fa fa-tasks"></i> Plans</a>
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
            @if(!current_user())
            <nav class="main__menu">
                <ul class="nav__menu">
                    <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                   <li><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
                   <li><a class="menu--active" href="{{ route('dests.index') }}">Add a destination</a></li>
                </ul>
            </nav>
            @elseif (current_user()->id == '1')
            <nav class="main__menu">
                <ul class="nav__menu">
                    <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                   <li><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
                   <li><a class="menu--active" href="{{ route('dests.index') }}">Add a destination</a></li>
                </ul>
            </nav>
            @else
            <nav class="main__menu">
                <ul class="nav__menu">
                    <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li><a class="nav-link" href="{{ route('datepicker') }}">Recommendation</a></li>
                   <li><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
                   <li><a class="menu--active" href="{{ route('dests.index') }}">Add a destination</a></li>
                </ul>
            </nav>
            @endif
        </div>
    </header>
    <!-- Header Section end -->
	<div class="container">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-12 d-flex">
            <h4 class="text-center mr-auto my-1">Add a new destination</h4>
          </div>
        </div>
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'dests.store', 'class' => 'form', 'id' => 'form-validation', 'files' => true]) !!}
        <div class="form-group has-label">
          <label>Destination Name
            <star class="star">*</star>
          </label>
          {{ Form::text('name', null, [ 'class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group has-label">
          <label>Description
            <star class="star">*</star>
          </label>
          {{ Form::textarea('description', null, ['class' => 'form-control', 'required']) }}
        </div>
         <div class="form-group has-label">
          <label>State
            <star class="star">*</star>
          </label>
          {{ Form::select('state', array('johor' => 'Johor', 'Kedah' => 'Kedah', 'Kelantan' => 'Kelantan', 'KL' => 'KL', 'Melaka' => 'Melaka', 'Pahang' => 'Pahang', 'Penang' => 'Penang', 'Perak' => 'Perak', 'Perlis' => 'Perlis', 'Sabah' => 'Sabah', 'Sarawak' => 'Sarawak', 'Selangor' => 'Selangor', 'Terengganu' => 'Terengganu'), null, ['class' => 'form-control', 'required']) }}
        </div>
         <div class="form-group has-label">
          <label>Type
            <star class="star">*</star>
          </label>
          {{ Form::select('type', array('Cultural' => 'Cultural', 'Adventurous' => 'Adventurous', 'Food' => 'Food', 'Relaxation' => 'Relaxation', 'Shopping' => 'Shopping', 'SightSeeing' => 'SightSeeing'), null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group has-label">
          <label>Picture Name
            <star class="star">*</star>
          </label>
          {{ Form::text('pictureName', null, [ 'class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group has-label">
          <label>Uploads
            <star class="star">*</star>
          </label><br>
          {{ Form::File('image', null, ['class' => 'form-control', 'required']) }}
        </div>
        <destinationcategory-component></destinationcategory-component>
        <keyword-destination-component></keyword-destination-component>
        <div class="card-category form-category">
          <star class="star">*</star> Required fields
				</div>

        <div class="card-footer text-right">
          <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
        </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection