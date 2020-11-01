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
                   <li><a class="nav-link" href="{{ route('dests.index') }}">Add a destination</a></li>
                </ul>
            </nav>
            @elseif (current_user()->id == '1')
            <nav class="main__menu">
                <ul class="nav__menu">
                    <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                   <li><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
                   <li><a class="nav-link" href="{{ route('dests.index') }}">Add a destination</a></li>
                </ul>
            </nav>
            @else
            <nav class="main__menu">
                <ul class="nav__menu">
                    <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li><a class="menu--active" href="{{ route('datepicker') }}">Recommendation</a></li>
                   <li><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
                   <li><a class="nav-link" href="{{ route('dests.index') }}">Add a destination</a></li>
                </ul>
            </nav>
            @endif
        </div>
    </header>
    <!-- Header Section end -->

  <div class="container">
    <div class="card">
      <div class="card-reader">
        <div class="row">
          <div class="col-12 d-flex">
            <h4 class="text-center mr-auto my-1">Create your recommendation</h4>
          </div>
        </div>
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'saveDate', 'class' => 'form', 'id' => 'form-validation']) !!}
        <div class="form-group has-label">
          <label>Start Date
            <star class="star">*</star>
          </label>
          {{ Form::Date('start_date', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group has-label">
          <label>End Date
            <star class="star">*</star>
          </label>
          {{ Form::Date('end_date', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group has-label">
          <label>Give a name
            <star class="star">*</star>
          </label>
          {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group has-label">
          <label>How many trips per day would you like? (e.g. 4)
            <star class="star">*</star>
          </label>
          {{ Form::number('number', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group has-label">
          <label>Choose an activity type
          </label>
          {{ Form::select('type', array('None' => 'None', 'cultural' => 'Cultural', 'adventurous' => 'Adventurous', 'food' => 'Food', 'relaxation' => 'Relaxation', 'shopping' => 'Shopping', 'sight seeing' => 'Sight Seeing'), null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group has-label">
          <label>State
            <star class="star">*</star>
          </label><br>
          {{ Form::select('state', array('Selangor' => 'Selangor', 'johor' => 'Johor', 'Kedah' => 'Kedah', 'Kelantan' => 'Kelantan', 'KL' => 'KL', 'Melaka' => 'Melaka', 'Pahang' => 'Pahang', 'Penang' => 'Penang', 'Perak' => 'Perak', 'Perlis' => 'Perlis', 'Sabah' => 'Sabah', 'Sarawak' => 'Sarawak', 'Terengganu' => 'Terengganu'), null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group has-label">
          <label>Category
            <star class="star">*</star>
          </label><br>
          {{ Form::select('category', array('1' => 'Family', '2' => 'Business', '3' => 'Solo Trip', '4r' => 'First Timer', '5' => 'Couple'), null, ['class' => 'form-control', 'required']) }}
        </div>
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